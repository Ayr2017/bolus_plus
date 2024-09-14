<?php

namespace App\Models\Event;

use \App\Interfaces\Event\Event as EventInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CurrentRestrictionEvent extends Event implements EventInterface
{
    protected $table = 'events';

    const STORE_RULES = [
        'data.start_at' => 'date|nullable',
        'data.end_at' => 'date|nullable',
    ];

    public function data(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? collect(json_decode($value, true)) : null,
            set: fn ($value) => $value ? json_encode($value) : null,
        );
    }
}
