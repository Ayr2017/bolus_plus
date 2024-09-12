<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    const STATUSES = [
        [
            'name' => 'New',
            'description' => 'New',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::STATUSES as $status) {
            Status::query()->firstOrCreate($status);
        }
    }
}
