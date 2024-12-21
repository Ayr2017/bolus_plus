<?php

namespace App\Services\SelectedBreedingBull;

use App\Models\BreedingBull;
use App\Models\SelectedBreedingBull;
use \App\Services\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class SelectedBreedingBullService extends Service
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

        return BreedingBull::query()->orderBy('id')->where('is_selected', true)->paginate(perPage: $perPage, page: $page);
    }


    public function update(array $validated, SelectedBreedingBull $selectedBreedingBull): ?SelectedBreedingBull
    {
        try {
            $selectedSelectedBreedingBullingBull = BreedingBull::query()->findOrFail($selectedBreedingBull);
            $result = $selectedSelectedBreedingBullingBull->update($validated);
            if ($result) {
                return $selectedSelectedBreedingBullingBull;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function store(mixed $data)
    {
        try {
            $selectedSelectedBreedingBullingBull = SelectedBreedingBull::query()->create($data);
            if ($selectedSelectedBreedingBullingBull) {
                return $selectedSelectedBreedingBullingBull;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;

    }

    public function show(SelectedBreedingBull $selectedBreedingBull): ?SelectedBreedingBull
    {
        try {
            return $selectedBreedingBull;
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }

        return null;
    }

    public function delete(SelectedBreedingBull $selectedSelectedBreedingBullingBull): bool
    {
        try {
            $result = $selectedSelectedBreedingBullingBull->delete();
            if ($result) {
                return true;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return false;
    }

}
