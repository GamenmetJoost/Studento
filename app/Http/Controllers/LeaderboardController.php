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

        // Zoek de plaats van de huidige gebruiker
        $currentUserPlacement = $ranked->search(function ($player) use ($currentUser) {
            return $player->id === $currentUser->id;
        });

        if ($currentUserPlacement !== false) {
            $currentUserPlacement += 1; // 0-based to 1-based
            $currentUserScore = $ranked[$currentUserPlacement - 1]->points;
        } else {
            $currentUserPlacement = null;
            $currentUserScore = null;
        }

        // Only show top 10 in leaderboard
        $topLeaderboard = $ranked->slice(0, 10);

        // Get all answers for the current user, ordered by time
        $answers = DB::table('answers')
            ->where('user_id', $currentUser->id)
            ->orderBy('created_at')
            ->pluck('is_correct');

        // Calculate current streak
        $currentStreak = 0;
        foreach (array_reverse($answers->toArray()) as $isCorrect) {
            if ($isCorrect) {
                $currentStreak++;
            } else {
                break;
            }
        }

        // Calculate highest streak
        $highestStreak = 0;
        $tempStreak = 0;
        foreach ($answers as $isCorrect) {
            if ($isCorrect) {
                $tempStreak++;
                if ($tempStreak > $highestStreak) {
                    $highestStreak = $tempStreak;
                }
            } else {
                $tempStreak = 0;
            }
        }

        // Pass to view
        return view('leaderboard', [
            'leaderboard' => $topLeaderboard,
            'currentUser' => $currentUser,
            'currentUserPlacement' => $currentUserPlacement,
            'currentUserScore' => $currentUserScore,
            'currentStreak' => $currentStreak,
            'highestStreak' => $highestStreak,
        ]);
    }
}
