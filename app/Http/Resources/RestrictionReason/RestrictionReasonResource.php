<?php

namespace App\Http\Resources\RestrictionReason;

use App\Http\Resources\PaginatedJsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RestrictionReasonResource extends PaginatedJsonResponse
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
            'description'=>$this->description,
            'updated_at'=>Carbon::make($this->updated_at)?->format('Y-m-d H:i:s')
        ];
    }
}
