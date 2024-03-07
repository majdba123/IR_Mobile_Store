<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\PivotOrderProduct;
use App\Models\Product as ModelsProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class product extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsProduct::factory()->count(5)->create();
    }

}
