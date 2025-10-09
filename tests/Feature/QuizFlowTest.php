<?php

use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use App\Models\Choice;
use App\Models\QuizAttempt;

it('runs through a category quiz and stores results', function () {
    $student = User::factory()->create(['role' => 'student']);
    $category = Category::factory()->create();

    // Build a small quiz: 5 questions with 3 choices, one correct each
    $questions = Question::factory()->count(5)->create(['category_id' => $category->id]);
    foreach ($questions as $q) {
        $correct = Choice::factory()->create(['question_id' => $q->id, 'is_correct' => true, 'mapped_value' => 1.0]);
        Choice::factory()->count(2)->create(['question_id' => $q->id, 'is_correct' => false, 'mapped_value' => 0.0]);
    }

    // Visit quiz page
    $this->actingAs($student)
        ->get(route('toetsen.category', $category->id))
        ->assertOk();

    // Submit answers (choose the correct choice for each)
    foreach ($questions as $index => $q) {
        $correct = $q->choices()->where('is_correct', true)->first();
        $this->post(route('toetsen.submit', $category->id), [
            'question_id' => $q->id,
            'answer' => $correct->id,
        ])->assertRedirect();
    }

    // Finish quiz
    $this->post(route('toetsen.finish', $category->id))
        ->assertRedirect(route('toetsen.result', $category->id));

    // Result page shows correct totals
    $this->get(route('toetsen.result', $category->id))->assertOk();

    expect(QuizAttempt::where('user_id', $student->id)->where('category_id', $category->id)->exists())->toBeTrue();
});
