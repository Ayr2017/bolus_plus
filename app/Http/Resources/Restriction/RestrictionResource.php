<?php

namespace App\Http\Resources\Restriction;

use App\Http\Resources\PaginatedJsonResponse;
use Illuminate\Http\Request;

class RestrictionResource extends PaginatedJsonResponse
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'title' => $this->title,
            'icon' => $this->icon,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
