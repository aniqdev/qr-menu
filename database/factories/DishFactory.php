<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cafe_id' => 1,
            'category_id' => rand(1, 15),
            'name' => fake()->company,
            'description' => fake()->text,
            'image' => fake()->imageUrl(640, 480, 'food', true),
        ];
    }
}
