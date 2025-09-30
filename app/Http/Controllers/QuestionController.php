<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuizResult;
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

    public function submitAnswer(Request $request, $category_id)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer' => 'required'
        ]);
        $category = \App\Models\Category::findOrFail($category_id);
        $question = Question::findOrFail($request->question_id);

        // Bewaar selectie in sessie per categorie
        $key = 'quiz.category.' . $category_id . '.selections';
        $selections = Session::get($key, []);
        $selections[$question->id] = $request->answer; // store raw choice id or true/false
        Session::put($key, $selections);

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

        // Opslaan in quiz_results
        QuizResult::create([
            'user_id' => Auth::id(),
            'correct_answers' => $correct
        ]);

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

        // Clear alleen de selections, laat review aanwezig voor GET result
        Session::forget($key);

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
}
