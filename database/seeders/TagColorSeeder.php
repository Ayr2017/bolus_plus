<?php

namespace Database\Seeders;

use App\Models\TagColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TagColor::insert([
            ['color' => '#000000'], // Black
            ['color' => '#FFFFFF'], // White
            ['color' => '#FF0000'], // Red
            ['color' => '#0000FF'], // Blue
            ['color' => '#FFFF00'], // Yellow
            ['color' => '#800080'], // Purple
            ['color' => '#FFC0CB'], // Pink
            ['color' => '#808080'], // Gray
            ['color' => '#008000'], // Green
            ['color' => '#A52A2A'], // Brown
        ]);
    }
}
