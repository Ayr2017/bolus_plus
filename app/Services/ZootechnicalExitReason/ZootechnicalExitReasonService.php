<?php

namespace App\Services\ZootechnicalExitReason;

use App\Models\ZootechnicalExitReason;
use \App\Services\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class ZootechnicalExitReasonService extends Service
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

        return ZootechnicalExitReason::query()->orderBy('id')->paginate(perPage: $perPage, page: $page);
    }

    public function update(array $validated, ZootechnicalExitReason $zootechnicalExitReason): ?ZootechnicalExitReason
    {
        try {
            $result = $zootechnicalExitReason->update($validated);
            if ($result) {
                return $zootechnicalExitReason;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function store(mixed $data)
    {
        try {
            $zootechnicalExitReason = ZootechnicalExitReason::query()->create($data);
            if ($zootechnicalExitReason) {
                return $zootechnicalExitReason;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function show(ZootechnicalExitReason $zootechnicalExitReason): ?ZootechnicalExitReason
    {
        try {
            return $zootechnicalExitReason;
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function delete(ZootechnicalExitReason $zootechnicalExitReason): bool
    {
        try {
            $result = $zootechnicalExitReason->delete();
            if ($result) {
                return true;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return false;
    }
}
