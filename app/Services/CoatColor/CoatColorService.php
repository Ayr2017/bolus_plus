<?php

namespace App\Services\CoatColor;

use App\Models\CoatColor;
use \App\Services\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class CoatColorService extends Service
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

        return CoatColor::query()->orderBy('id')->paginate(perPage: $perPage, page: $page);
    }

    public function update(array $validated, CoatColor $coatColor): ?CoatColor
    {
        try {
            $result = $coatColor->update($validated);
            if ($result) {
                return $coatColor;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function store(mixed $data)
    {
        try {
            $coatColor = CoatColor::query()->create($data);
            if ($coatColor) {
                return $coatColor;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function show(CoatColor $coatColor): ?CoatColor
    {
        try {
            return $coatColor;
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function delete(CoatColor $coatColor): bool
    {
        try {
            $result = $coatColor->delete();
            if ($result) {
                return true;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return false;
    }
}
