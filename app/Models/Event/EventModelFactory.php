<?php

namespace App\Models\Event;

class EventModelFactory
{
    public static function create(string $type, array $data = [])
    {
        return match ($type) {
            'CURRENT_RESTRICTION' => new CurrentRestrictionEvent($data),
            // Другие типы
            default => throw new \Exception("Unknown event type: $type"),
        };
    }
}
