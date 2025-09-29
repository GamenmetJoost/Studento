<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

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
}
