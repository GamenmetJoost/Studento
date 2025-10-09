<?php

use App\Models\QuizAttempt;

test('quiz attempt has sensible duration and score ranges', function () {
    $started = now()->subMinutes(10);
    $attempt = new QuizAttempt([
        'total_questions' => 10,
        'answered_questions' => 10,
        'correct_answers' => 7,
        'score_percent' => 70,
        'started_at' => $started,
        'finished_at' => (clone $started)->addMinutes(5),
        'duration_seconds' => 300,
    ]);

    expect($attempt->duration_seconds)->toBeGreaterThan(0);
    expect($attempt->score_percent)->toBeGreaterThanOrEqual(0)->toBeLessThanOrEqual(100);
});
