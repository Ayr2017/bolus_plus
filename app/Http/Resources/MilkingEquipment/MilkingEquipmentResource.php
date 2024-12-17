<?php

namespace App\Http\Resources\MilkingEquipment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MilkingEquipmentResource extends JsonResource
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
            'organization' => $this->whenLoaded('organization'),
            'department' => $this->whenLoaded('department'),
            'equipment_type' => $this->'equipmentType'),
        ];
    }
}
