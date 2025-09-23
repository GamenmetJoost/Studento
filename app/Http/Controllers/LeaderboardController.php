<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LeaderboardController extends Controller
{
    /**
     * Toon het leaderboard overzicht.
     */
    public function index()
    {
        // Alle users met hun totaal aantal correcte antwoorden ophalen
        $scores = DB::table('quiz_results')
            ->select('user_id', DB::raw('SUM(correct_answers) as total_points'))
            ->groupBy('user_id')
            ->orderByDesc('total_points')
            ->get();

        // Users aan scores koppelen
        $users = $scores->map(function ($score) {
            $user = User::find($score->user_id);

            return (object) [
                'id' => $user->id,
                'name' => $user->name,
                'points' => $score->total_points,
            ];
        });

        // Rangschikken op punten en opnieuw indexeren
        $ranked = $users->sortByDesc('points')->values();

        // Huidige gebruiker
        $currentUser = auth()->user();

        return view('leaderboard', [
            'leaderboard' => $ranked,
            'currentUser' => $currentUser,
        ]);
    }
}
