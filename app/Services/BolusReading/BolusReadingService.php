<?php

namespace App\Services\BolusReading;

use App\Models\BolusReading;
use \App\Services\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;

class BolusReadingService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getBolusReadings(array $validated): ?Collection
    {
        try {
            $bolusReadings = BolusReading::query()->get();
            if($bolusReadings){
                return $bolusReadings;
            }
        }catch (\Exception $exception){
            Log::error(__METHOD__." ".$exception->getMessage());
        }
        return null;
    }
}
