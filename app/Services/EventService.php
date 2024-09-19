<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class EventService extends Service
{
    public function __construct()
    {
        parent::__construct();
    }

    public function storeEvent(array $data): ?Event
    {
        try {
            $event = Event::query()->create($data);
            if ($event) {
                return $event;
            }
        } catch (\Exception $exception) {
            Log::error(__METHOD__ . " " . $exception->getMessage());
        }

        return null;
    }

    public function getEventDataClass($eventType)
    {
        return  App::make('\App\Entity\EventData\\'.Str::replace('_','',Str::title($eventType->slug)));

    }
}
