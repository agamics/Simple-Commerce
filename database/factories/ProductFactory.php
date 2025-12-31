<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->words(2, true),
            'price' => fake()->numberBetween(6, 20),
            'description' => fake()->text(),
            'image' => 'https://placehold.co/400',
            'category_id' => fake()->numberBetween(1, 5),
        ];
    }
}
