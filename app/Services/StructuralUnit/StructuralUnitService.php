<?php

namespace App\Services\StructuralUnit;

use App\Models\StructuralUnit;
use \App\Services\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class StructuralUnitService extends Service
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

        return StructuralUnit::query()->orderBy('id')->paginate(perPage: $perPage, page: $page);
    }

    public function update(array $validated, StructuralUnit $structuralUnit): ?StructuralUnit
    {
        try {
            $result = $structuralUnit->update($validated);
            if ($result) {
                return $structuralUnit;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function store(mixed $data)
    {
        try {
            $structuralUnit = StructuralUnit::query()->create($data);
            if ($structuralUnit) {
                return $structuralUnit;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function show(StructuralUnit $structuralUnit): ?StructuralUnit
    {
        try {
            return $structuralUnit;
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function delete(StructuralUnit $structuralUnit): bool
    {
        try {
            $result = $structuralUnit->delete();
            if ($result) {
                return true;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return false;
    }
}
