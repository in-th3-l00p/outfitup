<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            "title" => fake()->text(20),
            "description" => fake()->paragraph(),
            "price" => fake()->randomFloat(2, 0, 1000),
            "stock" => fake()->numberBetween(0, 100),
            "image" => fake()->imageUrl(),
            "active" => fake()->boolean()
        ];
    }
}
