<?php

namespace App\Http\Resources\Animal;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;

class AnimalResource extends JsonResource
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
            'uuid' => $this->uuid,
            'name' => $this->name,
            'number' => $this->number,
            'organisation_id' => $this->organisation_id,
            'birthday' => $this->birthday ? $this->birthdayYmd : null,
            'breed_id' => $this->breed_id,
            'number_rshn' => $this->number_rshn,
            'bolus_id' => $this->bolus_id,
            'number_rf' => $this->number_rf,
            'number_tavro' => $this->number_tavro,
            'number_tag' => $this->number_tag,
            'tag_color' => $this->tag_color,
            'number_collar' => $this->number_collar,
            'status_id' => $this->status_id,
            'sex' => $this->sex,
            'withdrawn_at' => $this->withdrawn_at,
            'created_at' => $this->created_at?->toDateTimeString(),
            'updated_at' => $this->updated_at?->toDateTimeString(),
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
            ['animals' => $data, ...$paginationMeta],
        );
    }
}
