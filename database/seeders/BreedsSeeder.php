<?php

namespace Database\Seeders;

use App\Models\Breed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BreedsSeeder extends Seeder
{
    const BREEDS = [
        'Голландская',
        'Симментальская',
        'Айрширская',
    ];

    public function run(): void
    {
        foreach (self::BREEDS as $breed) {
            Breed::query()->firstOrCreate(
                [
                    'name' => $breed,
                ]
            );
        }
    }
}
