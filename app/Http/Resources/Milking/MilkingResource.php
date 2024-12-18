<?php

namespace App\Http\Resources\Milking;

use App\Http\Resources\PaginatedJsonResponse;
use App\Http\Resources\Shift\ShiftResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MilkingResource extends PaginatedJsonResponse
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'shift' => ShiftResource::make($this->whenLoaded('shift')),
            'organization' => $this->whenLoaded('organization'),
            'department' => $this->whenLoaded('department'),
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
