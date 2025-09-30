<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Category;

class QuestionController extends Controller
{
    public function index()
    {
        // Haal alle vragen op en laad de categorie direct mee
        $questions = Question::with('category')->paginate(15);

        return view('questions.index', compact('questions'));
    }

    public function show(Question $question)
    {
        // Zorg dat de categorie ook hier beschikbaar is
        $question->load('category');

        return view('questions.show', compact('question'));
    }

    public function showByCategory(Request $request, Category $category)
    {
        // Haal alle vragen van deze categorie op
        $questions = $category->questions()->with('choices')->get();
        
        // Check of er een specifieke vraag nummer is opgegeven
        $vraagNummer = (int) $request->get('vraag', 1); // Default naar vraag 1
        
        // Zorg dat het vraag nummer binnen de grenzen ligt
        $vraagNummer = max(1, min($vraagNummer, $questions->count()));
        
        // Haal de specifieke vraag op (0-based index)
        $currentQuestion = $questions->get($vraagNummer - 1);
        
        if (!$currentQuestion) {
            abort(404, 'Vraag niet gevonden in deze categorie');
        }
        
        return view('questions.category', compact(
            'category',
            'questions',
            'currentQuestion',
            'vraagNummer'
        ));
    }
}
