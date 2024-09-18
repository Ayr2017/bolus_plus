<?php

namespace App\Services\EventType;

use App\Models\EventType;
use \App\Services\Service;
use Illuminate\Support\Facades\Log;

class EventTypeService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function storeEventType(mixed $validated)
    {
        try {
            $eventType = EventType::query()->create($validated);
            if($eventType){
                return $eventType;
            }
        }catch (\Exception $exception){
            Log::error(__METHOD__." ".$exception->getMessage());
        }

        return null;
    }

    public function updateEventType(mixed $validated, EventType $eventType): ?EventType
    {
        try {
            $result = $eventType->update($validated);
            if($result){
                return $eventType;
            }
        }catch (\Exception $exception){
            Log::error(__METHOD__." ".$exception->getMessage());
        }
        return null;
    }
}
