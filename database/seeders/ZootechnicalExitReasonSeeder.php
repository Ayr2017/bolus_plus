<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ZootechnicalExitReasonSeeder extends Seeder
{
    const REASONS = [
        ['id' => 1, 'name' => 'Несчастные случаи (травмы)'],
        ['id' => 2, 'name' => 'Причина не выяснена'],
        ['id' => 3, 'name' => 'Малопродуктивность'],
        ['id' => 4, 'name' => 'Старость'],
        ['id' => 5, 'name' => 'Яловость'],
        ['id' => 6, 'name' => 'Продажа'],
        ['id' => 7, 'name' => 'Зообрак'],
        ['id' => 8, 'name' => 'Племпродажа'],
        ['id' => 9, 'name' => 'Продажа населению'],
        ['id' => 10, 'name' => 'Травмы вымени'],
        ['id' => 11, 'name' => 'Недостатки экстерьера'],
        ['id' => 12, 'name' => 'Отставание в развитии'],
        ['id' => 13, 'name' => 'Спецзабой'],
        ['id' => 14, 'name' => 'Плохое качество спермы'],
        ['id' => 15, 'name' => 'Низкая оплодотворяющая способность'],
        ['id' => 16, 'name' => 'Достаточное накопление спермы'],
        ['id' => 17, 'name' => 'Буйный нрав'],
        ['id' => 18, 'name' => 'Ухудшатель потомства'],
        ['id' => 19, 'name' => 'Уродства потомства'],
        ['id' => 20, 'name' => 'Прочие причины'],
        ['id' => 21, 'name' => 'Травмы конечностей'],
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
        }, self::REASONS);

        // Вставка данных с временными метками
        DB::table('zootechnical_exit_reasons')->insertOrIgnore($dataWithTimestamps);
        DB::statement("SELECT SETVAL(pg_get_serial_sequence('zootechnical_exit_reasons', 'id'), (SELECT MAX(id) FROM breeds))");

    }
}
