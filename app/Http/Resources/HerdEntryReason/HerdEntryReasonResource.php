<?php

namespace App\Http\Resources\HerdEntryReason;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HerdEntryReasonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'is_active' => $this->is_active
        ];
    }
}
