<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AddressUser>
 */
class AddressUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'name_of_the_city' => fake()->city(),
            'number_of_the_street' => fake()->randomNumber(),
            'number_of_building' => fake()->randomNumber(),

        ];
    }
}
