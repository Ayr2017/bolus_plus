<?php

namespace App\Http\Resources\Event;

use App\Http\Resources\PaginatedJsonResponse;
use App\Models\Event\EventModelFactory;
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
            'data'=>$this->data,
        ];

        $eventModel = EventModelFactory::create($this->type);
        $fields = $eventModel->fields();

        foreach ($fields as $field) {
            $general[$field] = $this->$field;
        }

        return $general;
    }
}
