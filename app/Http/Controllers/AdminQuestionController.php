<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminQuestionController extends Controller
{
    public function index(Request $request)
    {
        $query = Question::with('category');
        if ($search = $request->get('q')) {
            $query->where(function($q) use ($search) {
                $q->where('question_text', 'like', "%$search%")
                  ->orWhere('identifier', 'like', "%$search%");
            });
        }
        if ($categoryId = $request->get('category')) {
            $query->where('category_id', $categoryId);
        }
        $questions = $query->orderBy('id')->paginate(25)->withQueryString();
        $categories = Category::orderBy('sector')->orderBy('category')->get();
        return view('admin.questions.index', compact('questions','categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('sector')->orderBy('category')->get();
        return view('admin.questions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'identifier' => 'nullable|string|max:50',
            'question_text' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        $question = Question::create($data);
        return redirect()->route('admin.questions.edit', $question)->with('status','Vraag aangemaakt');
    }

    public function edit(Question $question)
    {
        $question->load('choices');
        $categories = Category::orderBy('sector')->orderBy('category')->get();
        return view('admin.questions.edit', compact('question','categories'));
    }

    public function update(Request $request, Question $question)
    {
        $data = $request->validate([
            'identifier' => 'nullable|string|max:50',
            'question_text' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        $question->update($data);
        return back()->with('status','Vraag bijgewerkt');
    }

    public function destroy(Question $question)
    {
        DB::transaction(function() use ($question) {
            $question->choices()->delete();
            $question->delete();
        });
        return redirect()->route('admin.questions.index')->with('status','Vraag verwijderd');
    }
}
