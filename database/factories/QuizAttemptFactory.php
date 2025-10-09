<?php

namespace Database\Factories;

use App\Models\QuizAttempt;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<QuizAttempt> */
class QuizAttemptFactory extends Factory
{
    protected $model = QuizAttempt::class;

    public function definition(): array
    {
        $started = now()->subMinutes(rand(10, 120));
        $duration = rand(60, 600);
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'total_questions' => 10,
            'answered_questions' => 10,
            'correct_answers' => rand(0, 10),
            'score_percent' => $this->faker->randomFloat(2, 0, 100),
            'started_at' => $started,
            'finished_at' => (clone $started)->addSeconds($duration),
            'duration_seconds' => $duration,
        ];
    }
}
