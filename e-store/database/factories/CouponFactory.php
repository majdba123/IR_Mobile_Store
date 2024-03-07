<?php

namespace Database\Factories;
use App\Models\coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->word(), // Generate a unique word for code
            'discount' => $this->faker->randomFloat(2, 1, 100), // Generate a random discount amount
            'expiration_date' => $this->faker->dateTimeBetween('+1 week', '+1 year')->format('Y-m-d'),
        ];
    }
}
