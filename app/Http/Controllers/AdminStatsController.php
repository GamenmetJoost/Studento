<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\QuizAttempt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminStatsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(function ($request, $next) {
            if (!Auth::check() || Auth::user()->role !== 'admin') {
                abort(403, 'Niet geautoriseerd');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $search = trim((string) $request->get('q', ''));
        $categoryId = $request->get('category_id');
        $from = $request->get('from'); // yyyy-mm-dd
        $to = $request->get('to');     // yyyy-mm-dd

        // Subquery met aggregaties per gebruiker (alleen voltooide pogingen)
        $agg = QuizAttempt::query()
            ->selectRaw('user_id, COUNT(*) as attempts_count, AVG(score_percent) as avg_score, MAX(finished_at) as last_finished, SUM(correct_answers) as sum_correct, SUM(total_questions) as sum_total')
            ->where('duration_seconds', '>', 0)
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->when($from, fn($q) => $q->whereDate('finished_at', '>=', $from))
            ->when($to, fn($q) => $q->whereDate('finished_at', '<=', $to))
            ->groupBy('user_id');

        $rows = DB::query()->fromSub($agg, 'qs')
            ->join('users', 'users.id', '=', 'qs.user_id')
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($w) use ($search) {
                    $w->where('users.name', 'like', "%$search%")
                      ->orWhere('users.email', 'like', "%$search%");
                });
            })
            ->orderByDesc('last_finished')
            ->paginate(20)
            ->withQueryString();

        // KPI's
        $totalAttempts = QuizAttempt::where('duration_seconds', '>', 0)
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->when($from, fn($q) => $q->whereDate('finished_at', '>=', $from))
            ->when($to, fn($q) => $q->whereDate('finished_at', '<=', $to))
            ->count();
        $avgScore = round((float) QuizAttempt::where('duration_seconds', '>', 0)
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->when($from, fn($q) => $q->whereDate('finished_at', '>=', $from))
            ->when($to, fn($q) => $q->whereDate('finished_at', '<=', $to))
            ->avg('score_percent'), 1);
        $avgDuration = (int) QuizAttempt::where('duration_seconds', '>', 0)
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->when($from, fn($q) => $q->whereDate('finished_at', '>=', $from))
            ->when($to, fn($q) => $q->whereDate('finished_at', '<=', $to))
            ->avg('duration_seconds');

        $categories = Category::orderBy('category')->get(['id','category']);

        return view('admin.stats.index', [
            'rows' => $rows,
            'categories' => $categories,
            'filters' => [
                'q' => $search,
                'category_id' => $categoryId,
                'from' => $from,
                'to' => $to,
            ],
            'totalAttempts' => $totalAttempts,
            'avgScore' => $avgScore ?: 0,
            'avgDuration' => $avgDuration ?: 0,
        ]);
    }

    public function show(User $user, Request $request)
    {
        $categoryId = $request->get('category_id');
        $from = $request->get('from');
        $to = $request->get('to');

        $attempts = QuizAttempt::with('category')
            ->where('user_id', $user->id)
            ->where('duration_seconds', '>', 0)
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->when($from, fn($q) => $q->whereDate('finished_at', '>=', $from))
            ->when($to, fn($q) => $q->whereDate('finished_at', '<=', $to))
            ->orderByDesc('finished_at')
            ->paginate(20)
            ->withQueryString();

        $stats = QuizAttempt::where('user_id', $user->id)
            ->where('duration_seconds', '>', 0)
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->when($from, fn($q) => $q->whereDate('finished_at', '>=', $from))
            ->when($to, fn($q) => $q->whereDate('finished_at', '<=', $to))
            ->selectRaw('COUNT(*) as attempts_count, AVG(score_percent) as avg_score, SUM(correct_answers) as sum_correct, SUM(total_questions) as sum_total')
            ->first();

        $categories = Category::orderBy('category')->get(['id','category']);

        return view('admin.stats.show', [
            'student' => $user,
            'attempts' => $attempts,
            'stats' => $stats,
            'categories' => $categories,
            'filters' => [
                'category_id' => $categoryId,
                'from' => $from,
                'to' => $to,
            ],
        ]);
    }
}
