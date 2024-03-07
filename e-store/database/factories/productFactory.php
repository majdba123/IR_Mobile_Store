<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\offer;
use Database\Seeders\catgory;
use Database\Seeders\Offerseesers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mobile_name' => fake()->company,
            'Cpu_spsecfication' => fake()->randomElement(['snap', 'media', 'xnon']),
            'Gpu_spsecfication' => fake()->randomElement(['arndeo', 'm', 'a']),
            'battery_spsecfication' => fake()->randomElement(['100mah,250mah,36mah']),
            'Front_camera_spsecfication' => fake()->randomElement(['100px', '250px', '36mpx']),
            'Back_camera_spsecfication' => fake()->randomElement(['10px', '20px', '3mpx']),
            'Screen_Size' => fake()->randomElement(['48px', '68px', '98px']),
            'Type_of_charge' => fake()->randomElement(['usb-c', 'usb-e']),
            'Price' => fake()->randomElement(['121', '251', '63']),
            'imge' => fake()->randomElement(['c://', 'D://']),
            'Company_id' => Company::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'offer_id' => offer::all()->random()->id,

        ];
    }
}
