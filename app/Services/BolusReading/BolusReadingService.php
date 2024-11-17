<?php

namespace App\Services\BolusReading;

use App\Filters\BolusReadingFilter;
use App\Models\BolusReading;
use \App\Services\Service;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;


class BolusReadingService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getBolusReadings(array $validated, BolusReadingFilter $filter): ?LengthAwarePaginator
    {
        try {

            $cacheKey = 'bolus_readings_' . md5(json_encode($validated));
            $bolusReadings = Cache::tags(['bolus_readings'])->remember($cacheKey, 5, function () use ($validated,$filter) {
                $perPage = $validated['perPage'] ?? 25;
                $page = $validated['page'] ?? 1;
                return  BolusReading::query()->filter($filter)->paginate(perPage: $perPage, page: $page);
            });

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
