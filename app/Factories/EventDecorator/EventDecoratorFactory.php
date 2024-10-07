<?php

namespace App\Factories\EventDecorator;

use AllowDynamicProperties;
use App\Models\Event;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;


#[AllowDynamicProperties] class EventDecoratorFactory
{
    public function build($event)
    {
        $decorator =    App::make('\App\Decorators\Event\\' . ucfirst(Str::camel(Str::lower($event->eventType->slug))));
        $decorator->setEvent($event);
        return $decorator;
    }

}
