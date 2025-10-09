<?php

use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use App\Models\Choice;
use App\Models\QuizAttempt;
use App\Models\QuizAttemptAnswer;

function seedSmallAttempt(User $user): QuizAttempt {
    $category = Category::factory()->create();
    $questions = Question::factory()->count(3)->create(['category_id' => $category->id]);
    foreach ($questions as $q) {
        $correct = Choice::factory()->create(['question_id' => $q->id, 'is_correct' => true, 'mapped_value' => 1.0]);
        Choice::factory()->count(1)->create(['question_id' => $q->id, 'is_correct' => false]);
    }

    $started = now()->subHour();
    $attempt = QuizAttempt::create([
        'user_id' => $user->id,
        'category_id' => $category->id,
        'total_questions' => 3,
        'answered_questions' => 3,
        'correct_answers' => 0,
        'score_percent' => 0,
        'started_at' => $started,
        'finished_at' => (clone $started)->addMinutes(5),
        'duration_seconds' => 300,
    ]);

    $corrects = 0;
    foreach ($questions as $q) {
        $pick = $q->choices()->inRandomOrder()->first();
        QuizAttemptAnswer::create([
            'quiz_attempt_id' => $attempt->id,
            'question_id' => $q->id,
            'choice_id' => $pick->id,
            'answer_value' => null,
            'was_correct' => (bool) $pick->is_correct,
            'answered_at' => $started->copy()->addMinutes(1),
        ]);
        if ($pick->is_correct) { $corrects++; }
    }

    $attempt->update([
        'correct_answers' => $corrects,
        'score_percent' => round(($corrects/3)*100,2),
    ]);

    return $attempt;
}

it('shows admin stats and allows admin to open attempt details', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $student = User::factory()->create(['role' => 'student']);
    $attempt = seedSmallAttempt($student);

    $this->actingAs($admin)
        ->get(route('admin.stats.index'))
        ->assertOk()
        ->assertSee('Student statistieken');

    $this->get(route('admin.stats.show', $student))
        ->assertOk()
        ->assertSee((string) $student->name);

    // Admin can also open attempt detail view
    $this->get(route('quiz_attempt.result', $attempt->id))
        ->assertOk();
});

it('prevents non-admin from opening others attempt details', function () {
    $owner = User::factory()->create(['role' => 'student']);
    $other = User::factory()->create(['role' => 'student']);
    $attempt = seedSmallAttempt($owner);

    $this->actingAs($other)
        ->get(route('quiz_attempt.result', $attempt->id))
        ->assertStatus(403);
});
