<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shift::insert([
            ['name' => 'утренняя', 'organization_id' => 1, 'department_id' => 1, 'start_time' => '5:00', 'end_time' => '12:00'],
            ['name' => 'дневная', 'organization_id' => 1, 'department_id' => 1, 'start_time' => '12:00', 'end_time' => '18:00'],
            ['name' => 'вечерняя', 'organization_id' => 1, 'department_id' => 1, 'start_time' => '18:00', 'end_time' => '24:00'],
        ]);
    }
}
