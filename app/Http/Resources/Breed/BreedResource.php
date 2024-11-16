<?php

namespace App\Http\Resources\Breed;

use App\Http\Resources\PaginatedJsonResponse;
use Illuminate\Http\Request;

class BreedResource extends PaginatedJsonResponse
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
                'name'=>$this->name,
            ];
    }

}
