<?php

namespace App\Http\Resources\BolusReading;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IndexBolusReadingResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'error' => null, // или замените на соответствующее значение ошибки
            'message' => 'Success', // или любое сообщение
            'data' => $this->collection, // данные из модели
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
