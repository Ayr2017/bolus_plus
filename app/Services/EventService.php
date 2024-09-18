<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Support\Facades\Log;

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
}
