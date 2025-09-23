<?php

namespace App\Imports;

use App\Models\Question;
use App\Models\Answer;

class QtiImporter
{
    public function import($filePath)
    {
        $xml = simplexml_load_file($filePath);
        if (!$xml) {
            throw new \Exception('Invalid QTI file format: ' . $filePath);
        }

        $xml->registerXPathNamespace('qti', 'http://www.imsglobal.org/xsd/imsqti_v2p1');

        if ($xml->getName() === 'assessmentItem') {
            $this->processQuestion($xml);
        } else {
            foreach ($xml->xpath('//qti:assessmentItem | //assessmentItem') as $item) {
                $this->processQuestion($item);
            }
        }

        return true;
    }

    public function importFromZip($zipPath)
    {
        $zip = new \ZipArchive;
        if ($zip->open($zipPath) !== TRUE) {
            throw new \Exception('Failed to open ZIP file: ' . $zipPath);
        }

        $tempDir = sys_get_temp_dir() . '/qti_import_' . uniqid();
        mkdir($tempDir, 0777, true);

        $zip->extractTo($tempDir);
        $zip->close();

        // Verwerk alle bestanden en mappen in de directory recursief
        $this->processDirectory($tempDir);

        $this->deleteDirectory($tempDir);
        return true;
    }

    private function processDirectory($dir)
    {
        $files = array_diff(scandir($dir), ['.', '..']);

        foreach ($files as $file) {
            // negeer macOS resource files
            if (strpos($file, '__MACOSX') === 0 || strpos($file, '._') === 0) {
                continue;
            }

            $path = $dir . '/' . $file;

            if (is_dir($path)) {
                $this->processDirectory($path);
            } elseif (strtolower(pathinfo($path, PATHINFO_EXTENSION)) === 'xml') {
                $this->import($path);
            } elseif (strtolower(pathinfo($path, PATHINFO_EXTENSION)) === 'zip') {
                $this->importFromZip($path); // recursief nested ZIP
            }
        }
    }

    private function processQuestion($item)
    {
        $title = (string) $item['title'] ?? 'Untitled Question';
        $identifier = (string) $item['identifier'];
        $questionBody = $this->extractQuestionBody($item);

        // Maak nieuwe vraag of update bestaande
        $question = Question::updateOrCreate(
            ['identifier' => $identifier],
            ['question_text' => $questionBody]
        );

        // Verwijder oude antwoorden
        Answer::where('question_id', $question->id)->delete();

        // Voeg antwoorden toe
        $this->processAnswers($item, $question);

        return $question;
    }

    private function extractQuestionBody($item)
    {
        $item->registerXPathNamespace('qti', 'http://www.imsglobal.org/xsd/imsqti_v2p1');
        $itemBody = $item->xpath('.//qti:itemBody | .//itemBody')[0] ?? null;

        if ($itemBody) {
            $questionText = '';
            foreach ($itemBody->xpath('.//p | .//div') as $element) {
                $text = trim(strip_tags((string) $element));
                if (!empty($text)) $questionText .= $text . ' ';
            }
            return trim($questionText) ?: 'Question text not found';
        }

        return 'Question text not found';
    }

    private function processAnswers($item, $question)
    {
        $item->registerXPathNamespace('qti', 'http://www.imsglobal.org/xsd/imsqti_v2p1');
        $correctResponse = $item->xpath('.//qti:correctResponse/qti:value | .//correctResponse/value')[0] ?? null;
        $correctValue = $correctResponse ? (string) $correctResponse : null;

        $choices = $item->xpath('.//qti:choiceInteraction/qti:simpleChoice | .//choiceInteraction/simpleChoice');

        foreach ($choices as $choice) {
            $identifier = (string) $choice['identifier'];
            $answerText = trim((string) $choice);
            if (empty($answerText)) continue;

            Answer::create([
                'question_id' => $question->id,
                'answer_text' => $answerText,
                'is_correct' => ($identifier === $correctValue),
            ]);
        }
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
