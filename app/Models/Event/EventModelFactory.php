<?php

namespace App\Models\Event;

use Exception;

class EventModelFactory
{
    /**
     * @param string $type
     * @param array $data
     * @return CurrentRestrictionEvent
     * @throws Exception
     */
    public static function create(string $type, array $data = [])
    {
        return match ($type) {
            'CURRENT_RESTRICTION' => new CurrentRestrictionEvent($data),
            // Другие типы
            default => throw new \Exception("Unknown event type: $type"),
        };
    }
}
