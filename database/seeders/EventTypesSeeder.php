<?php

namespace Database\Seeders;

use App\Models\EventType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class EventTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = database_path('/seeders/EventTypes/event_types.json');

        // Проверка существования файла
        if (File::exists($jsonFile)) {
            // Чтение и декодирование JSON
            $jsonData = File::get($jsonFile);
            $eventTypes = json_decode($jsonData, true);

            // Вставка данных в таблицу event_types
            foreach ($eventTypes as $eventType) {
                EventType::firstOrCreate(['id' => $eventType['id']], $eventType,[
                    'name' => $eventType['name'],
                    'slug' => $eventType['slug'],
                    'description' => $eventType['description'],
                    'store_rules' => $eventType['store_rules'],
                    'update_rules' => $eventType['update_rules']
                ]);
            }
        } else {
            $this->command->error("Файл event_types.json не найден.");
        }
    }
}
