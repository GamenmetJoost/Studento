<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question; // of het model dat bij jou de vragen bevat

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        // Voorbeeld: alle vragen binnen die categorie ophalen
        $questions = Question::where('category_id', $category->id)->get();

        return view('categories.show', compact('category', 'questions'));
    }
}
