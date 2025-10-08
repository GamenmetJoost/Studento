<?php

namespace App\Imports;

use App\Models\Question;
use App\Models\Choice;
use App\Models\Category;

class QtiImporter
{
    public function import($filePath, $allowUpdate = false, ?int $categoryId = null)
    {
        $xml = @simplexml_load_file($filePath);
        if (!$xml) {
            throw new \Exception('Invalid QTI XML file: cannot parse ' . basename($filePath));
        }

        $xml->registerXPathNamespace('qti', 'http://www.imsglobal.org/xsd/imsqti_v2p1');

        $processed = 0;
        if ($xml->getName() === 'assessmentItem') {
            $this->processQuestion($xml, $allowUpdate, $categoryId);
            $processed++;
        } else {
            foreach ($xml->xpath('//qti:assessmentItem | //assessmentItem') as $item) {
                $this->processQuestion($item, $allowUpdate, $categoryId);
                $processed++;
            }
        }

        if ($processed === 0) {
            throw new \Exception('No assessmentItem entries found in XML.');
        }

        return true;
    }

    public function importFromZip($zipPath, $continueOnError = false)
    {
        $zip = new \ZipArchive;
        if ($zip->open($zipPath) !== TRUE) {
            throw new \Exception('Failed to open ZIP file: ' . $zipPath);
        }

        $tempDir = sys_get_temp_dir() . '/qti_import_' . uniqid();
        mkdir($tempDir, 0777, true);

        $zip->extractTo($tempDir);
        $zip->close();

    // Bepaal categorie uit bestandsnaam en resolve category id
    $catInfo = $this->parseZipCategory($zipPath);
    $categoryId = $this->resolveCategoryId($catInfo);

    // Verwerk alle bestanden en mappen in de directory recursief
    $result = $this->processDirectory($tempDir, $continueOnError, $categoryId);

        $this->deleteDirectory($tempDir);
        return $result;
    }

    private function processDirectory($dir, $continueOnError = false, ?int $categoryId = null)
    {
        $files = array_diff(scandir($dir), ['.', '..']);
        $summary = [
            'processed' => 0,
            'imported' => 0,
            'failed' => 0,
            'errors' => [],
        ];

        foreach ($files as $file) {
            // negeer macOS resource files
            if (strpos($file, '__MACOSX') === 0 || strpos($file, '._') === 0) {
                continue;
            }

            $path = $dir . '/' . $file;

            if (is_dir($path)) {
                $child = $this->processDirectory($path, $continueOnError, $categoryId);
                $summary = $this->mergeSummary($summary, $child);
            } elseif (strtolower(pathinfo($path, PATHINFO_EXTENSION)) === 'xml') {
                $summary['processed']++;
                try {
                    // No updates allowed per requirement
                    $this->import($path, false, $categoryId);
                    $summary['imported']++;
                } catch (\Throwable $e) {
                    $summary['failed']++;
                    $summary['errors'][] = [
                        'file' => basename($path),
                        'message' => $e->getMessage(),
                    ];
                    if (!$continueOnError) {
                        // Stoppen bij eerste fout
                        throw $e;
                    }
                }
            } elseif (strtolower(pathinfo($path, PATHINFO_EXTENSION)) === 'zip') {
                try {
                    $nested = $this->importFromZip($path, $continueOnError); // recursief nested ZIP
                    $summary = $this->mergeSummary($summary, $nested);
                } catch (\Throwable $e) {
                    $summary['failed']++;
                    $summary['errors'][] = [
                        'file' => basename($path),
                        'message' => $e->getMessage(),
                    ];
                    if (!$continueOnError) {
                        throw $e;
                    }
                }
            }
        }
        return $summary;
    }

    private function processQuestion($item, $allowUpdate = false, ?int $categoryId = null)
    {
        $title = (string) ($item['title'] ?? '') ?: 'Untitled Question';
        $identifier = $this->normalizeIdentifier((string) $item['identifier']);
        $questionBody = $this->extractQuestionBody($item);

        if ($identifier === '') {
            throw new \Exception('Missing identifier on assessmentItem.');
        }

        // Maak nieuwe vraag of update bestaande afhankelijk van policy
        $existing = Question::where('identifier', $identifier)->first();
        if ($existing) {
            // Nooit updaten: duplicate is een fout
            throw new \Exception("Question with identifier '{$identifier}' already exists.");
        }
        $question = Question::create([
            'identifier' => $identifier,
            'question_text' => $questionBody,
            'category_id' => $categoryId,
        ]);

        // Verwijder oude keuzes/antwoorden
        $question->choices()->delete();

        // Voeg keuze-opties toe
        $count = $this->processChoices($item, $question);

        if ($count === 0) {
            throw new \Exception("No choices found for question '{$identifier}'.");
        }

        return $question;
    }

    private function mergeSummary(array $a, array $b): array
    {
        return [
            'processed' => ($a['processed'] ?? 0) + ($b['processed'] ?? 0),
            'imported' => ($a['imported'] ?? 0) + ($b['imported'] ?? 0),
            'failed' => ($a['failed'] ?? 0) + ($b['failed'] ?? 0),
            'errors' => array_merge($a['errors'] ?? [], $b['errors'] ?? []),
        ];
    }

    private function parseZipCategory(string $zipPath): ?array
    {
        $base = pathinfo($zipPath, PATHINFO_FILENAME);
        // Expect pattern: Sector_ Category_GUID or Sector_Category_GUID (allow spaces around underscore)
        $parts = preg_split('/\s*_\s*/', $base);
        if (!$parts || count($parts) < 2) {
            return null;
        }
        $last = end($parts);
        $guidPattern = '/^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}$/';
        $folder_guid = preg_match($guidPattern, $last) ? $last : null;
        // sector = first part, category = second part (trim spaces)
        $sector = trim($parts[0]);
        $category = trim($parts[1]);
        if ($sector === '' && $category === '') {
            return null;
        }
        return [
            'sector' => $sector ?: null,
            'category' => $category ?: null,
            'folder_guid' => $folder_guid,
        ];
    }

    private function resolveCategoryId(?array $info): ?int
    {
        if (!$info) return null;
        $sector = $info['sector'] ?? null;
        $category = $info['category'] ?? null;
        $folderGuid = $info['folder_guid'] ?? null;

        // Try by folder_guid first
        if ($folderGuid) {
            $found = Category::where('folder_guid', $folderGuid)->first();
            if ($found) return $found->id;
        }

        // Try case-insensitive sector+category match
        $query = Category::query();
        if ($sector !== null) {
            $query->whereRaw('LOWER(sector) = ?', [strtolower($sector)]);
        }
        if ($category !== null) {
            $query->whereRaw('LOWER(category) = ?', [strtolower($category)]);
        }
        $found = $query->first();
        if ($found) return $found->id;

        // Create if not exists
        $created = Category::create([
            'sector' => $sector,
            'category' => $category,
            'folder_guid' => $folderGuid,
        ]);
        return $created->id;
    }

    private function normalizeIdentifier(string $raw): string
    {
        $raw = trim($raw);
        if ($raw === '') return '';
        // Neem het stuk na de laatste underscore als er underscores zijn
        $parts = explode('_', $raw);
        $last = end($parts) ?: $raw;
        // Max 50 tekens; neem de laatste 50 (zoals gewenst)
        if (strlen($last) > 50) {
            return substr($last, -50);
        }
        return $last;
    }

    private function extractQuestionBody($item)
    {
        $item->registerXPathNamespace('qti', 'http://www.imsglobal.org/xsd/imsqti_v2p1');
        $itemBody = $item->xpath('.//qti:itemBody | .//itemBody')[0] ?? null;

        if ($itemBody) {
            // Prefer the first <div> (most QTI exporters wrap the stem in a div)
            $div = $itemBody->xpath('.//div')[0] ?? null;
            $html = null;
            if ($div) {
                $html = $div->asXML();
            } else {
                // Fallback: first child element of itemBody
                foreach ($itemBody->children() as $child) {
                    $html = $child->asXML();
                    break;
                }
            }
            if ($html === null) {
                return '';
            }

            // Convert HTML-ish content to plain text with line breaks
            $text = (string) $html;
            // Normalize line breaks elements to \n
            // <br> tags
            $text = preg_replace('/<br\s*\/?\s*>/i', "\n", $text);
            // Closing block-level tags to newlines
            $text = preg_replace('/<\/(p|div|li|h[1-6]|tr|table|ul|ol)\s*>/i', "\n", $text);
            // Also add newline after <p> opening to separate tight content cases
            $text = preg_replace('/<p\b[^>]*>/i', '', $text);
            // Remove remaining tags
            $text = strip_tags($text);
            // Decode entities
            $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            // Normalize whitespace/newlines
            $text = str_replace(["\r\n", "\r"], "\n", $text);
            // Collapse more than 2 newlines to exactly 2
            $text = preg_replace("/\n{3,}/", "\n\n", $text);
            // Collapse excessive spaces
            $text = preg_replace('/[\t ]+/', ' ', $text);
            // Trim
            return trim($text);
        }

        return 'Question text not found';
    }

    private function processChoices($item, $question)
    {
        $item->registerXPathNamespace('qti', 'http://www.imsglobal.org/xsd/imsqti_v2p1');
        $correctResponse = $item->xpath('.//qti:correctResponse/qti:value | .//correctResponse/value')[0] ?? null;
        $correctValue = $correctResponse ? (string) $correctResponse : null;

        // Lees mapping (optioneel)
        $mappingEntries = $item->xpath('.//qti:mapping/qti:mapEntry | .//mapping/mapEntry');
        $mapping = [];
        foreach ($mappingEntries as $entry) {
            $mapKey = (string) ($entry['mapKey'] ?? '');
            $mappedValue = (float) ($entry['mappedValue'] ?? 0);
            if ($mapKey !== '') {
                $mapping[$mapKey] = $mappedValue;
            }
        }

        $choices = $item->xpath('.//qti:choiceInteraction/qti:simpleChoice | .//choiceInteraction/simpleChoice');
        $created = 0;

        foreach ($choices as $choice) {
            $identifier = (string) $choice['identifier'];
            // Text kan in CDATA staan; (string) cast levert text content
            $answerText = trim((string) $choice);
            if ($answerText === '') continue;
            Choice::create([
                'question_id' => $question->id,
                'identifier' => $identifier,
                'choice_text' => $answerText,
                'is_correct' => ($identifier === $correctValue),
                'mapped_value' => $mapping[$identifier] ?? null,
            ]);
            $created++;
        }

        return $created;
    }

    private function deleteDirectory($dir)
    {
        if (!is_dir($dir)) return;
        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            $path = $dir . '/' . $file;
            is_dir($path) ? $this->deleteDirectory($path) : unlink($path);
        }
        rmdir($dir);
    }
}
