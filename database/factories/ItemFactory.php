<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => 1,
            'category_id' => rand(1, 15),
            'name' => fake()->company,
            'description' => fake()->text,
            'price' => fake()->randomFloat(2, 50, 5000),
            'old_price' => fake()->randomFloat(2, 50, 5000),
            'image' => \App\Services\SeedService::getRandomHotDogImageUrl(),
        ];
    }
}
