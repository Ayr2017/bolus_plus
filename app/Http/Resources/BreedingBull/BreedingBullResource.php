<?php

namespace App\Http\Resources\BreedingBull;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BreedingBullResource extends JsonResource
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
            'seed_supplier' => $this->seed_supplier,
            'nickname' => $this->nickname,
            'date_of_birth' => $this->date_of_birth ? $this->date_of_birth->toDateString() : null,
            'country_of_birth' => $this->country_of_birth,
            'tag_number' => $this->tag_number,
            'seed_code' => $this->seed_code,
            'rshn_id' => $this->rshn_id,
            'color' => $this->color,
            'breed_id' => $this->breed_id,
            'is_selected' => $this->is_selected,
        ];
    }
}
