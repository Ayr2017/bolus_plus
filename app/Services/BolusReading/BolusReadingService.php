<?php

namespace App\Services\BolusReading;

use App\Models\BolusReading;
use \App\Services\Service;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BolusReadingService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getBolusReadings(array $validated): ?LengthAwarePaginator
    {
        try {
            $perPage = $validated['perPage'] ?? 25;
            $page = $validated['page'] ?? 1;
            $bolusReadings = BolusReading::query()->paginate(perPage:$perPage,page: $page);
            if($bolusReadings){
                return $bolusReadings;
            }
        }catch (\Exception $exception){
            Log::error(__METHOD__." ".$exception->getMessage());
        }
        return null;
    }

    public function pullBolusReading(): bool
    {
        try {
            Artisan::call("app:download-bolus-readings-command");
            return true;
        }catch (\Exception $exception){
            Log::error(__METHOD__." ".$exception->getMessage());
        }
        return false;
    }
}
