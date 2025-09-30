<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class DashboardController extends Controller
{
    /**
     * Toon het dashboard of de stats-pagina met alle categorieën die vragen hebben.
     */
    public function index()
    {
        // Alle categorieën ophalen die gekoppeld zijn aan minstens 1 vraag
        $categories = Category::whereHas('questions')->get();

        $userId = auth()->id();
        // Voeg quiz attempts van de gebruiker toe per categorie
        foreach ($categories as $category) {
            $category->user_quiz_attempts = $category->quizAttempts()->where('user_id', $userId)->get();
        }

        // Kies view afhankelijk van route
        $view = request()->routeIs('stats') ? 'stats' : 'dashboard';

        // View laden en categorieën doorgeven
        return view($view, compact('categories'));
    }
}
