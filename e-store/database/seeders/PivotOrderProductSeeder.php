<?php

namespace Database\Seeders;

use App\Models\PivotOrderProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PivotOrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PivotOrderProduct::factory()->count(5)->create();
    }
}
