<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bolus;

class BolusesSeeder extends Seeder
{
    public function run(): void
    {
        Bolus::factory()->count(10)->create();
    }
}
