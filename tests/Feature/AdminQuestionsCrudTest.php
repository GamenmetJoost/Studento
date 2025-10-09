<?php

use App\Models\User;
use App\Models\Category;
use App\Models\Question;

beforeEach(function () {
    $this->admin = User::factory()->create(['role' => 'admin']);
});

it('lists, creates, edits and deletes questions', function () {
    $category = Category::factory()->create();

    // index
    $this->actingAs($this->admin)
        ->get(route('admin.questions.index'))
        ->assertOk();

    // create
    $createPayload = [
        'identifier' => null,
        'question_text' => 'Testvraag',
        'category_id' => $category->id,
    ];
    $this->post(route('admin.questions.store'), $createPayload)
        ->assertRedirect();

    $question = Question::where('question_text', 'Testvraag')->firstOrFail();

    // edit
    $this->get(route('admin.questions.edit', $question))->assertOk();

    // update
    $this->patch(route('admin.questions.update', $question), [
        'identifier' => 'ID123',
        'question_text' => 'Gewijzigde vraag',
        'category_id' => $category->id,
    ])->assertRedirect();

    // delete
    $this->delete(route('admin.questions.destroy', $question))
        ->assertRedirect(route('admin.questions.index'));
});
