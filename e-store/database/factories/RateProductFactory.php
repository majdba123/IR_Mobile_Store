<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RateProduct>
 */
class RateProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number_of_rate_for_product' => fake()->numberBetween(1, 5),
            'product_id' => Product::all()->random()->id,
            'User_id' => User::all()->random()->id,

        ];
    }
}
