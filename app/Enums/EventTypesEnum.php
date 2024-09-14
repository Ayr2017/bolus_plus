<?php

namespace App\Enums;
use App\Models\Event\CurrentRestrictionEvent;

enum EventTypesEnum: string
{
    case CurrentRestrictionEvent = CurrentRestrictionEvent::class;

    public function description():string
    {
        return match($this)
        {
            self::CurrentRestrictionEvent => 'Текущее ограничение',
        };
    }
    public function icon():string
    {
        return match($this)
        {
            self::CurrentRestrictionEvent => '<i class="bi bi-sign-stop"></i>',
        };
    }
}


