<?php

namespace App\Http\Resources\Event;

use App\Http\Resources\PaginatedJsonResponse;
use App\Modules\Event\DataObject\EventDataObjectFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends PaginatedJsonResponse
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Общие поля
        $general = [
            'id' => $this->id,
            'type' => $this->type,
            'event_category' => $this->event_category,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];


        // Получаем объект данных через фабрику
        $dataObject = EventDataObjectFactory::create($this->type, $this->data ?? []);

        // Получаем специальные поля через метод fields() из объекта данных
        $special = $dataObject->dataArray(); // Предполагается, что метод fields() возвращает массив полей

        // Объединяем общие поля с особыми
        return array_merge($general, $special);
    }
}
