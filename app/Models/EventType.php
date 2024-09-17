<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'slug',
        'store_rules',
        'update_rules',
    ];

    public function storeRules():Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? collect(json_decode($value, true)) : collect(),
            set: fn ($value) => $value ? json_encode($value) : null
        );
    }
    public function updateRules():Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? collect(json_decode($value, true)) : collect(),
            set: fn ($value) => $value ? json_encode($value) : null
        );
    }
}
