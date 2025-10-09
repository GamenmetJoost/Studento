<?php

namespace Database\Factories;

use App\Models\QuizAttemptAnswer;
use App\Models\QuizAttempt;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<QuizAttemptAnswer> */
class QuizAttemptAnswerFactory extends Factory
{
    protected $model = QuizAttemptAnswer::class;

    public function definition(): array
    {
        return [
            'quiz_attempt_id' => QuizAttempt::factory(),
            'question_id' => Question::factory(),
            'choice_id' => null, // will often be filled after creating a choice for the question
            'answer_value' => null,
            'was_correct' => false,
            'answered_at' => now(),
        ];
    }
}
