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
        $category = \App\Models\Category::inRandomOrder()->first();

        return [
            'company_id' => 1,
            'category_id' => $category->id,
            'name' => fake()->company,
            'description' => fake()->text,
            'price' => fake()->numberBetween(50, 2000),
            'old_price' => fake()->numberBetween(100, 10000),
            'image' => \App\Services\SeedService::getRandomHotDogImageUrl(),
        ];
    }
}
