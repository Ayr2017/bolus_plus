<?php

namespace App\Http\Resources\InseminationMethod;

use App\Http\Resources\PaginatedJsonResponse;
use Illuminate\Http\Request;

class InseminationMethodResource extends PaginatedJsonResponse
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
            'is_active' => $this->is_active,
            'description'=>$this->description,
            'updated_at'=>$this->updated_at,
        ];
    }
}
