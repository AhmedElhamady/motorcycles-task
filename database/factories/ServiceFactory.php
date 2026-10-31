<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ['en' => fake()->unique()->words(2, true)],
            'description' => ['en' => fake()->sentence(12)],
            'image' => null,
        ];
    }
}
