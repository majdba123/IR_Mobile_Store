<?php

namespace Database\Seeders;

use App\Models\offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Offerseesers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        offer::factory()->count(5)->create();
    }
}
