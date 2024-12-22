<?php

namespace App\Http\Resources\BreedingBull;

use App\Http\Resources\PaginatedJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BreedingBullResource extends PaginatedJsonResponse
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
            'type' => $this->type,
            'semen_supplier' => $this->seed_supplier,
            'nickname' => $this->nickname,
            'date_of_birth' => $this->date_of_birth ? $this->date_of_birth->toDateString() : null,
            'country_of_birth' => $this->country_of_birth,
            'tag_number' => $this->tag_number,
            'semen_code' => $this->seed_code,
            'rshn_id' => $this->rshn_id,
            'breed_id' => $this->breed_id,
            'is_selected' => $this->is_selected,
            'is_active' => $this->is_active,
            'is_own' => $this->is_own,
            'coat_color_id' => $this->coat_color_id,
            'created_at' => $this->created_at?->toDateTimeString(),
            'updated_at' => $this->updated_at?->toDateTimeString(),
            'breed' => $this->breed,
        ];
    }
}
