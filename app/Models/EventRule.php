<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventRule extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "title",
        "number",
        "event_type_id",
        "rules",
        "rule_method",
    ];

    public function eventType():BelongsTo
    {
        return $this->belongsTo(EventType::class);
    }

    public function rules():Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? collect(json_decode($value, true)) : collect(),
            set: fn ($value) => $value ? json_encode($value) : null
        );
    }
}
