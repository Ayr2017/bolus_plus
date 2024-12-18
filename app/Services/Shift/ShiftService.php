<?php

namespace App\Services\Shift;

use App\Models\Shift;
use \App\Services\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class ShiftService extends Service
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

        return Shift::query()->orderBy('id')->with(['organization', 'department'])->paginate(perPage: $perPage, page: $page);
    }

    public function update(array $validated, Shift $shift): ?Shift
    {
        try {
            $result = $shift->update($validated);
            if ($result) {
                return $shift->load(['organization', 'department']);
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function store(mixed $data)
    {
        try {
            $shift = Shift::query()->create($data);

            if ($shift) {
                return $shift->load(['organization', 'department']);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return null;
    }

    public function show(Shift $shift): ?Shift
    {
        try {
            return $shift->load(['organization', 'department']);
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function delete(Shift $shift): bool
    {
        try {
            $result = $shift->delete();
            if ($result) {
                return true;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return false;
    }
}
