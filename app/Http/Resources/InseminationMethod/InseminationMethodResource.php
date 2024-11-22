<?php

namespace App\Http\Resources\InseminationMethod;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InseminationMethodResource extends JsonResource
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
            'slug' => $this->slug,
            'value'=>$this->value,
        ];
    }
}
