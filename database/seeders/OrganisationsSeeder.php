<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organisation;

class OrganisationsSeeder extends Seeder
{

    public function run(): void
    {
        Organisation::factory()->count(10)->create();
    }
}
