<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SemenPortionSeeder extends Seeder
{
    const SEMEN_PORTIONS = [
        ['id' => 1, 'name' => 'Полная'],
        ['id' => 2, 'name' => 'Половина'],
        ['id' => 3, 'name' => 'Четверть'],
        ['id' => 4, 'name' => 'Двойная'],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = Carbon::now();

        // Добавляем временные метки ко всем элементам массива
        $dataWithTimestamps = array_map(function ($item) use ($timestamp) {
            return array_merge($item, [
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);
        }, self::SEMEN_PORTIONS);

        // Вставка данных с временными метками
        DB::table('semen_portions')->insertOrIgnore($dataWithTimestamps);
        DB::statement("SELECT SETVAL(pg_get_serial_sequence('semen_portions', 'id'), (SELECT MAX(id) FROM breeds))");

    }
}
