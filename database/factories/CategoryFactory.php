<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ['en' => fake()->unique()->words(2, true)],
            'image' => null,
        ];
    }
}
