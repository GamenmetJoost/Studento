<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question; // of het model dat bij jou de vragen bevat
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sector')->orderBy('category')->get();
        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        // Voorbeeld: alle vragen binnen die categorie ophalen
        $questions = Question::where('category_id', $category->id)->get();

        return view('categories.show', compact('category', 'questions'));
    }

    public function follow(Category $category)
    {
        $user = Auth::user();
        if (!$user) { abort(403); }
        $user->categories()->syncWithoutDetaching([$category->id]);
        return back()->with('status', 'Onderwerp toegevoegd aan je interesses.');
    }

    public function unfollow(Category $category)
    {
        $user = Auth::user();
        if (!$user) { abort(403); }
        $user->categories()->detach($category->id);
        return back()->with('status', 'Onderwerp verwijderd uit je interesses.');
    }
}
