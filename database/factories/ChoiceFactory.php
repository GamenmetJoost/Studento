<?php

namespace Database\Factories;

use App\Models\Choice;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Choice> */
class ChoiceFactory extends Factory
{
    protected $model = Choice::class;

    public function definition(): array
    {
        return [
            'question_id' => Question::factory(),
            'identifier' => strtoupper('A'. $this->faker->bothify('#?')),
            'choice_text' => $this->faker->sentence(6),
            'is_correct' => false,
            'mapped_value' => 0.0,
        ];
    }
}
