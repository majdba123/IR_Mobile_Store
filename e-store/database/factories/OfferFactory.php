<?php

namespace Database\Factories;
use App\Models\offer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'percent_of_discount' => fake()->randomElement(['10', '15', '50']),
            'expiration_date' => fake()->dateTimeThisDecade()->format('Y-m-d'),        ];

    }
}
