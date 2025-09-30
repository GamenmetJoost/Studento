<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Choice;

class AdminChoiceController extends Controller
{
    public function store(Request $request, Question $question)
    {
        $data = $request->validate([
            'identifier' => 'required|string|max:20',
            'choice_text' => 'required|string',
            'is_correct' => 'nullable|boolean'
        ]);

        if (!empty($data['is_correct'])) {
            // Zorg dat er maximaal 1 correct antwoord is (indien dat de bedoeling is voor de quiz)
            $question->choices()->update(['is_correct' => false]);
            $data['is_correct'] = true;
        } else {
            $data['is_correct'] = false;
        }

        $data['question_id'] = $question->id;
        Choice::create($data);
        return redirect()->route('admin.questions.edit', $question)->with('status','Optie toegevoegd');
    }

    public function destroy(Choice $choice)
    {
        $question = $choice->question;
        $choice->delete();
        return redirect()->route('admin.questions.edit', $question)->with('status','Optie verwijderd');
    }
}
