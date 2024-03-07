<?php

namespace Database\Seeders;

use App\Models\Company as ModelsCompany;
use Database\Factories\companyFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class company extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsCompany::factory()->count(5)->create();
    }
}
