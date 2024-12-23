<?php

namespace App\Services\BreedingBull;

use App\Models\BreedingBull;
use \App\Services\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BreedingBullService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function index(array $data): LengthAwarePaginator
    {
        $perPage = Arr::get($data, 'per_page', 50);
        $page = Arr::get($data, 'page', 1);

        return QueryBuilder::for(BreedingBull::class)
            ->allowedFilters([
                AllowedFilter::exact('is_selected'),
                AllowedFilter::exact('is_own'),
                AllowedFilter::exact('is_active'),
            ])
            ->paginate(perPage: $perPage, page: $page);
    }

    public function update(array $validated, BreedingBull $breedingBull): ?BreedingBull
    {
        try {
            $result = $breedingBull->update($validated);
            if ($result) {
                return $breedingBull;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function store(mixed $data)
    {
        try {
            $breedingBull = BreedingBull::query()->create($data);
            if ($breedingBull) {
                return $breedingBull;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function show(BreedingBull $breedingBull): ?BreedingBull
    {
        try {
            return $breedingBull;
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function delete(BreedingBull $breedingBull): bool
    {
        try {
            $result = $breedingBull->delete();
            if ($result) {
                return true;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return false;
    }

    public function selectedBreedingBulls(array $data): LengthAwarePaginator
    {
        $perPage = Arr::get($data, 'per_page', 50);
        $page = Arr::get($data, 'page', 1);

        return BreedingBull::query()->where('is_selected', true)->orderBy('id')->paginate(perPage: $perPage, page: $page);
    }
}
