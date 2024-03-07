<?php

namespace Database\Seeders;
use App\Models\coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\CouponFactory;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        coupon::factory()->count(5)->create();
    }
}
