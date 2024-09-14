<?php

namespace App\Interfaces\Event;

use Illuminate\Database\Eloquent\Casts\Attribute;

interface Event
{
    public function data():Attribute;
}
