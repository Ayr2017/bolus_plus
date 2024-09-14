<?php

namespace App\Services;

use App\Models\Event\CurrentRestrictionEvent;
use App\Models\Event\Event;
use \App\Services\Service;
use Illuminate\Support\Facades\Log;

class EventService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function storeEvent(array $data): ?Event
    {
        $event = CurrentRestrictionEvent::query()->create($data);
        if($event){
            return $event;
        }
        try {

        }catch (\Exception $exception){
            Log::error(__METHOD__." ".$exception->getMessage());
        }

        return null;
    }
}
