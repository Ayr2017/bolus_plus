<?php

namespace App\Modules\Event\DataObject;

class EventDataObjectFactory
{

    public static function create(string $type, array $data = []): EventDataObject
    {
        return match ($type) {
            'CURRENT_RESTRICTION' => new CurrentRestrictionDataObject($data),
            // Другие типы
            default => throw new \Exception("Unknown event type: $type"),
        };
    }
}
