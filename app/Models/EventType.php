<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventType extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'slug',
    ];

    public function eventRules(): HasMany
    {
        return $this->hasMany(EventRule::class);
    }

    public function storeRules(): HasMany
    {
        return $this->hasMany(EventRule::class)->where('rule_method', 'store');
    }
    public function updateRules(): HasMany
    {
        return $this->hasMany(EventRule::class)->where('rule_method', 'update');
    }

}
