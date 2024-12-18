<?php

namespace App\Services\MilkingEquipment;

use App\Models\MilkingEquipment;
use \App\Services\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class MilkingEquipmentService extends Service
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

        return MilkingEquipment::query()->orderBy('id')->with('organization', 'department')->paginate(perPage: $perPage, page: $page);
    }

    public function update(array $validated, MilkingEquipment $milkingEquipment): ?MilkingEquipment
    {
        try {
            $result = $milkingEquipment->update($validated);
            if ($result) {
                return $milkingEquipment->load('organization', 'department');
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function store(mixed $data)
    {
        try {
            $milkingEquipment = MilkingEquipment::query()->create($data);
            if ($milkingEquipment) {
                return $milkingEquipment->load('organization', 'department');
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function show(MilkingEquipment $milkingEquipment): ?MilkingEquipment
    {
        try {
            return $milkingEquipment->load('organization', 'department');
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return null;
    }

    public function delete(MilkingEquipment $milkingEquipment): bool
    {
        try {
            $result = $milkingEquipment->delete();
            if ($result) {
                return true;
            }
        } catch (\Exception $e) {
            Log::error(__METHOD__ . " " . $e->getMessage());
        }
        return false;
    }
}
