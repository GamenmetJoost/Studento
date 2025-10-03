<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuizResult;
use App\Models\QuizAttempt;
use App\Models\QuizAttemptAnswer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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

    public function showByCategory(Request $request, $category_id)
    {
        // Zoek de categorie
        $category = \App\Models\Category::findOrFail($category_id);
        
        // Haal alle vragen van deze categorie op
        $questions = $category->questions()->with('choices')->get();
        
        // Check of er een specifieke vraag nummer is opgegeven
        $vraagNummer = $request->get('vraag', 1); // Default naar vraag 1
        
        // Zorg dat het vraag nummer binnen de grenzen ligt
        $vraagNummer = max(1, min($vraagNummer, $questions->count()));
        
        // Haal de specifieke vraag op (0-based index)
        $currentQuestion = $questions->get($vraagNummer - 1);
        
        if (!$currentQuestion) {
            abort(404, 'Vraag niet gevonden in deze categorie');
        }
        
        return view('question', compact('category', 'questions', 'currentQuestion', 'vraagNummer'));
    }

    public function toggleMark(Request $request, $category_id)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'vraag' => 'nullable|integer|min:1'
        ]);
        $markKey = 'quiz.category.' . $category_id . '.marked';
        $marked = Session::get($markKey, []);
        $qid = (int) $request->question_id;
        if (in_array($qid, $marked)) {
            $marked = array_values(array_filter($marked, fn($m) => (int)$m !== $qid));
        } else {
            $marked[] = $qid;
        }
        Session::put($markKey, $marked);
        return redirect()->route('toetsen.category', [
            'category_id' => $category_id,
            'vraag' => $request->get('vraag')
        ]);
    }

    public function submitAnswer(Request $request, $category_id)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer' => 'required'
        ]);
        $category = \App\Models\Category::findOrFail($category_id);
        $question = Question::findOrFail($request->question_id);

        // Initialiseer attempt indien nog niet bestaand
        $attemptKey = 'quiz.category.' . $category_id . '.attempt_id';
        $startedKey = 'quiz.category.' . $category_id . '.started_at';
        $attemptId = Session::get($attemptKey);
        if (!$attemptId) {
            $attempt = QuizAttempt::create([
                'user_id' => Auth::id(),
                'category_id' => $category_id,
                'total_questions' => $category->questions()->count(),
                'answered_questions' => 0,
                'correct_answers' => 0,
                'score_percent' => 0,
                'started_at' => now(),
                'finished_at' => now(), // temporary, updated on finish
                'duration_seconds' => 0,
            ]);
            $attemptId = $attempt->id;
            Session::put($attemptKey, $attemptId);
            Session::put($startedKey, now());
        }

        // Bewaar selectie in sessie per categorie (voor UX state)
        $key = 'quiz.category.' . $category_id . '.selections';
        $selections = Session::get($key, []);
        $selections[$question->id] = $request->answer; // store raw choice id or true/false
        Session::put($key, $selections);

        // Sla per vraag antwoord op (upsert)
        $existing = QuizAttemptAnswer::where('quiz_attempt_id', $attemptId)
            ->where('question_id', $question->id)
            ->first();
        $wasCorrect = false;
        if ($question->choices()->count() > 0) {
            $choice = $question->choices()->where('id', $request->answer)->first();
            $wasCorrect = $choice?->is_correct ?? false;
        } else {
            $wasCorrect = ($request->answer === 'true');
        }
        if ($existing) {
            $existing->update([
                'choice_id' => is_numeric($request->answer) ? $request->answer : null,
                'answer_value' => !is_numeric($request->answer) ? $request->answer : null,
                'was_correct' => $wasCorrect,
                'answered_at' => now(),
            ]);
        } else {
            QuizAttemptAnswer::create([
                'quiz_attempt_id' => $attemptId,
                'question_id' => $question->id,
                'choice_id' => is_numeric($request->answer) ? $request->answer : null,
                'answer_value' => !is_numeric($request->answer) ? $request->answer : null,
                'was_correct' => $wasCorrect,
                'answered_at' => now(),
            ]);
        }

        // Bepaal huidig vraag nummer voor redirect
        $questions = $category->questions()->pluck('id')->toArray();
        $index = array_search($question->id, $questions);
        $vraagNummer = $index === false ? 1 : $index + 1;

        // Blijf op zelfde vraag zodat student kan verder navigeren zelf
        return redirect()->route('toetsen.category', [
            'category_id' => $category_id,
            'vraag' => $vraagNummer
        ])->with('saved', true);
    }

    public function finishCategoryQuiz(Request $request, $category_id)
    {
        $category = \App\Models\Category::findOrFail($category_id);
        $questions = $category->questions()->with('choices')->get();

        $key = 'quiz.category.' . $category_id . '.selections';
        $selections = Session::get($key, []);
        $attemptKey = 'quiz.category.' . $category_id . '.attempt_id';
        $startedKey = 'quiz.category.' . $category_id . '.started_at';
        $attemptId = Session::get($attemptKey);

        $correct = 0;
        $total = $questions->count();

        foreach ($questions as $q) {
            if (!array_key_exists($q->id, $selections)) {
                continue; // unanswered
            }
            $answerValue = $selections[$q->id];
            if ($q->choices->count() > 0) {
                $choice = $q->choices->firstWhere('id', $answerValue);
                if ($choice && $choice->is_correct) {
                    $correct++;
                }
            } else {
                // true/false fallback expecting 'true' means correct
                if ($answerValue === 'true') {
                    $correct++;
                }
            }
        }

        // Opslaan / bijwerken in quiz_results (aggregate legacy)
        if ($correct > 0) {
            QuizResult::create([
                'user_id' => Auth::id(),
                'correct_answers' => $correct
            ]);
        }

        // Update attempt record indien aanwezig
        if ($attemptId) {
            $attempt = QuizAttempt::find($attemptId);
            if ($attempt) {
                $answeredCount = QuizAttemptAnswer::where('quiz_attempt_id', $attemptId)->count();
                $correctCount = QuizAttemptAnswer::where('quiz_attempt_id', $attemptId)->where('was_correct', true)->count();
                $startTime = Session::get($startedKey, now());
                $duration = now()->diffInSeconds($startTime);
                $attempt->update([
                    'answered_questions' => $answeredCount,
                    'correct_answers' => $correctCount,
                    'score_percent' => $total > 0 ? round(($correctCount / $total) * 100, 2) : 0,
                    'finished_at' => now(),
                    'duration_seconds' => $duration,
                ]);
        }
        }

        // Bouw review data
        $review = [];
        foreach ($questions as $q) {
            $userAnswer = $selections[$q->id] ?? null;
            $correctChoice = $q->choices->firstWhere('is_correct', true);
            $review[] = [
                'question_id' => $q->id,
                'question_text' => $q->question_text,
                'user_answer_id' => $userAnswer,
                'user_answer_is_correct' => $q->choices->count() > 0
                    ? optional($q->choices->firstWhere('id', $userAnswer))->is_correct
                    : ($userAnswer === 'true'),
                'correct_choice_id' => $correctChoice->id ?? null,
                'correct_choice_text' => $correctChoice->choice_text ?? ($q->choices->count() === 0 ? 'Waar' : null),
                'choices' => $q->choices->map(function ($c) use ($userAnswer) {
                    return [
                        'id' => $c->id,
                        'identifier' => $c->identifier,
                        'text' => $c->choice_text,
                        'is_correct' => $c->is_correct,
                        'is_selected' => (string)$c->id === (string)$userAnswer,
                    ];
                })->values()->toArray(),
                'fallback_boolean' => $q->choices->count() === 0,
                'fallback_selected' => $q->choices->count() === 0 ? $userAnswer : null,
            ];
        }

        // Bewaar review data in session tijdelijk voor result pagina
        $reviewKey = 'quiz.category.' . $category_id . '.review';
        Session::put($reviewKey, [
            'score' => $correct,
            'total' => $total,
            'data' => $review,
            'timestamp' => now(),
        ]);

    // Clear alleen de selections & attempt meta, laat review aanwezig voor GET result
    Session::forget($key);
    Session::forget($attemptKey);
    Session::forget($startedKey);

        return redirect()->route('toetsen.result', ['category_id' => $category_id]);
    }

    public function showCategoryResult(Request $request, $category_id)
    {
        $category = \App\Models\Category::findOrFail($category_id);
        $reviewKey = 'quiz.category.' . $category_id . '.review';
        $payload = Session::get($reviewKey);
        if (!$payload) {
            return redirect()->route('toetsen.category', ['category_id' => $category_id])
                ->with('message', 'Geen resultaat beschikbaar, maak eerst de toets.');
        }
        return view('quiz_result', [
            'category' => $category,
            'score' => $payload['score'],
            'total' => $payload['total'],
            'review' => $payload['data'],
            'completed_at' => $payload['timestamp'],
        ]);
    }

    public function showQuizAttemptResult(Request $request, $attemptId)
    {
        $attempt = \App\Models\QuizAttempt::with('category')->findOrFail($attemptId);
        // Alleen eigen attempts mogen worden ingezien
        abort_if(auth()->id() !== $attempt->user_id, 403);

        // Bouw review-data op exact zoals bij einde-toets, maar nu uit DB
        $category = $attempt->category;
        $questions = $category->questions()->with('choices')->get();
        $answers = $attempt->answers()->get()->keyBy('question_id');

        $review = [];
        foreach ($questions as $q) {
            $answer = $answers->get($q->id);
            $hasChoices = $q->choices->count() > 0;
            $userAnswer = null;
            if ($hasChoices) {
                $userAnswer = $answer?->choice_id; // id van gekozen choice
            } else {
                $userAnswer = $answer?->answer_value; // 'true'/'false' voor boolean
            }

            $correctChoice = $q->choices->firstWhere('is_correct', true);
            $review[] = [
                'question_id' => $q->id,
                'question_text' => $q->question_text,
                'user_answer_id' => $userAnswer,
                'user_answer_is_correct' => $hasChoices
                    ? optional($q->choices->firstWhere('id', $userAnswer))->is_correct
                    : ($userAnswer === 'true'),
                'correct_choice_id' => $correctChoice->id ?? null,
                'correct_choice_text' => $correctChoice->choice_text ?? ($hasChoices ? null : 'Waar'),
                'choices' => $q->choices->map(function ($c) use ($userAnswer) {
                    return [
                        'id' => $c->id,
                        'identifier' => $c->identifier,
                        'text' => $c->choice_text,
                        'is_correct' => (bool)$c->is_correct,
                        'is_selected' => (string)$c->id === (string)$userAnswer,
                    ];
                })->values()->toArray(),
                'fallback_boolean' => !$hasChoices,
                'fallback_selected' => !$hasChoices ? $userAnswer : null,
            ];
        }

        return view('quiz_result', [
            'category' => $attempt->category,
            'score' => $attempt->correct_answers,
            'total' => $attempt->total_questions,
            'review' => $review,
            'completed_at' => $attempt->finished_at,
        ]);
    }
}
