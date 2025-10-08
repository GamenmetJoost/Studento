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
            'identifier' => 'nullable|string|max:50|unique:questions,identifier',
            'question_text' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Normaliseer lege identifier naar null
        $data['identifier'] = isset($data['identifier']) && $data['identifier'] !== ''
            ? trim($data['identifier'])
            : null;

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
            'identifier' => 'nullable|string|max:50|unique:questions,identifier,' . $question->id,
            'question_text' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Normaliseer lege identifier naar null en trim input
        $data['identifier'] = isset($data['identifier']) && $data['identifier'] !== ''
            ? trim($data['identifier'])
            : null;
        $data['question_text'] = trim($data['question_text']);

        $question->fill($data)->save();

        // Redirect expliciet naar de edit route zodat het model opnieuw geladen wordt
        return redirect()->route('admin.questions.edit', $question)->with('status','Vraag bijgewerkt');
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
