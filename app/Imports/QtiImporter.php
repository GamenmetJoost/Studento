<?php

namespace App\Imports;

use App\Models\Question;
use App\Models\Answer;

class QtiImporter
{
    public function import($filePath)
    {
        // Load and parse the QTI XML file
        $xml = simplexml_load_file($filePath);
        
        if (!$xml) {
            throw new \Exception('Invalid QTI file format');
        }
        
        // Register namespace for QTI
        $xml->registerXPathNamespace('qti', 'http://www.imsglobal.org/xsd/imsqti_v2p1');
        
        // Check if this is a single assessmentItem or contains multiple items
        if ($xml->getName() === 'assessmentItem') {
            // Single item
            $this->processQuestion($xml);
        } else {
            // Multiple items - process each assessmentItem
            foreach ($xml->xpath('//qti:assessmentItem | //assessmentItem') as $item) {
                $this->processQuestion($item);
            }
        }
        
        return true;
    }
    
    private function processQuestion($item)
    {
        $title = (string) $item['title'] ?? 'Untitled Question';
        $identifier = (string) $item['identifier'];
        
        // Extract question body
        $questionBody = $this->extractQuestionBody($item);
        
        // Create question - using correct field names
        $question = Question::create([
            'identifier' => $identifier,
            'question_text' => $questionBody,
        ]);
        
        // Process answers
        $this->processAnswers($item, $question);
        
        return $question;
    }
    
    private function extractQuestionBody($item)
    {
        // Register namespace
        $item->registerXPathNamespace('qti', 'http://www.imsglobal.org/xsd/imsqti_v2p1');
        
        // Try different ways to find the question text
        $itemBody = $item->xpath('.//qti:itemBody | .//itemBody')[0] ?? null;
        
        if ($itemBody) {
            // Extract text from paragraphs and divs, handling CDATA
            $questionText = '';
            foreach ($itemBody->xpath('.//p | .//div') as $element) {
                $text = (string) $element;
                // Clean up the text
                $text = strip_tags($text);
                $text = trim($text);
                if (!empty($text)) {
                    $questionText .= $text . ' ';
                }
            }
            return trim($questionText) ?: 'Question text not found';
        }
        
        return 'Question text not found';
    }
    
    private function processAnswers($item, $question)
    {
        // Register namespace
        $item->registerXPathNamespace('qti', 'http://www.imsglobal.org/xsd/imsqti_v2p1');
        
        // Find correct response
        $correctResponse = $item->xpath('.//qti:correctResponse/qti:value | .//correctResponse/value')[0] ?? null;
        $correctValue = $correctResponse ? (string) $correctResponse : null;
        
        // Find choice interactions
        $choices = $item->xpath('.//qti:choiceInteraction/qti:simpleChoice | .//choiceInteraction/simpleChoice');
        
        foreach ($choices as $choice) {
            $identifier = (string) $choice['identifier'];
            
            // Handle CDATA content properly
            $answerText = (string) $choice;
            $answerText = trim($answerText);
            
            // Skip empty answers
            if (empty($answerText)) {
                continue;
            }
            
            $isCorrect = ($identifier === $correctValue);
            
            Answer::create([
                'question_id' => $question->id,
                'answer_text' => $answerText,
                'is_correct' => $isCorrect,
            ]);
        }
    }
}