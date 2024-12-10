<?php

namespace App\Http\Resources\HerdEntryReason;

use App\Http\Resources\PaginatedJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HerdEntryReasonResource extends PaginatedJsonResponse
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
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active
        ];
    }
}
