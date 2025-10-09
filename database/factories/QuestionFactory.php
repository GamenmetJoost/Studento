<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Question> */
class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition(): array
    {
        return [
            'identifier' => substr($this->faker->unique()->sha1(), 0, 10),
            'question_text' => $this->faker->sentence(10),
            'category_id' => Category::factory(),
        ];
    }
}
