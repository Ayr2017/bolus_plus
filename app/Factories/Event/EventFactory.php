<?php

namespace App\Factories\Event;

use App\Models\Event;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class EventFactory
{
    public static function create(Event $event)
    {
            return  App::make('\App\Models\Event\\'.Str::headline(Str::lower($event->eventType->slug)))::find($event->id);
    }
}
