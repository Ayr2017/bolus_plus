<?php

namespace App\Http\Resources\Event;

use App\Http\Resources\PaginatedJsonResponse;
use App\Models\Event\EventModelFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class IndexEventResource extends PaginatedJsonResponse
{
    public function toArray(Request $request): array
    {
        return  [
            'id' => $this->id,
            'type' => $this->type,
            'event_category' => $this->event_category,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
            'data' => $this->data,
        ];

    }
}
