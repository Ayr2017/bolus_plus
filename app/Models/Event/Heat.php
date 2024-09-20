<?php

namespace App\Models\Event;

use App\Models\Event;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class Heat extends Event
{
    public function isInseminated():Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  $value ? 'YES'  : 'NO',
        );
    }
    public function startAt():Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::make($this->data->get('start_at'))?->format('Y-m-d H:i:s') ?? null,
        );
    }
    public function endAt():Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::make($this->data->get('end_at'))?->format('Y-m-d H:i:s') ?? null,
        );
    }
    public function inseminationStartAt():Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::make($this->data->get('insemination_start_at'))?->format('Y-m-d H:i:s') ?? null,
        );
    }
    public function inseminationEndAt():Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::make($this->data->get('insemination_end_at'))?->format('Y-m-d H:i:s') ?? null,
        );
    }
}
