<?php

use App\Models\QuizAttempt;

test('quiz attempt has sensible duration and score ranges', function () {
    $attempt = QuizAttempt::factory()->create([
        'total_questions' => 10,
        'answered_questions' => 10,
        'correct_answers' => 7,
        'score_percent' => 70,
        'duration_seconds' => 300,
    ]);

    expect($attempt->duration_seconds)->toBeGreaterThan(0);
    expect($attempt->score_percent)->toBeGreaterThanOrEqual(0)->toBeLessThanOrEqual(100);
});
