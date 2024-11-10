<?php

namespace App\Repositories\Animal;

use App\Models\Animal;
use Illuminate\Pagination\LengthAwarePaginator;

class AnimalRepository
{

    public function getAnimals(mixed $validated): LengthAwarePaginator
    {
        $perPage = $validated['per_page'] ?? 10;
        $page = $validated['page'] ?? null;
        return Animal::query()->paginate(perPage: $perPage, page:$page);
    }
}
