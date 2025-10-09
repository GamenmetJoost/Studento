<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Category> */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'sector' => 'Sociaal werk',
            'category' => $this->faker->unique()->words(2, true),
            'folder_guid' => $this->faker->uuid(),
        ];
    }
}
