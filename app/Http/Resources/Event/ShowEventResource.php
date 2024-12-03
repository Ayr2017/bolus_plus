<?php

namespace App\Http\Resources\Event;

use App\Http\Resources\PaginatedJsonResponse;
use App\Models\Event\EventModelFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ShowEventResource extends PaginatedJsonResponse
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

        $eventModel = EventModelFactory::create($this->type);
        $fields = $eventModel->getDataFields();
        $appends = $eventModel->getAppends();

        foreach ($fields as $field) {
            $key = str_replace('data.', '', $field);
            $general['data'][$key] = Arr::get($this, $field);
        }

        foreach ($appends as $append) {
            $general[$append] = $this->$append;
        }

        return $general;
    }
}
