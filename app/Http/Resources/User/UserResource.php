<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;

class UserResource extends JsonResource
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
            'name' => $this->name ?? null,
            'surname' => $this->surname?? null,
            'email' => $this->email ?? null,
            'phone' => $this->phone ?? null,
            'created_at' => $this->created_at?->toDateTimeString() ?? null,
        ];
    }

    public static function paginatedCollection(LengthAwarePaginator $paginator): array
    {
        $data = self::collection($paginator->items());

        $paginationMeta = [
            'current_page' => $paginator->currentPage(),
            'first_page_url' => $paginator->url(1),
            'from' => $paginator->firstItem(),
            'last_page' => $paginator->lastPage(),
            'last_page_url' => $paginator->url($paginator->lastPage()),
            'next_page_url' => $paginator->nextPageUrl(),
            'path' => $paginator->path(),
            'per_page' => $paginator->perPage(),
            'prev_page_url' => $paginator->previousPageUrl(),
            'to' => $paginator->lastItem(),
            'total' => $paginator->total(),
        ];

        return array_merge(
            ['users' => $data, ...$paginationMeta],
        );
    }
}
