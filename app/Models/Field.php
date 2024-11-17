<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Field extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'order',
        'slug',
        'title',
        'type',
        'event_type_id',
        'options',
        'description',
        'rule_store',
        'rule_update',
        ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->slug = Str::upper(Str::slug($model->name, '_'));
        });
        self::updating(function ($model) {
            $model->slug = Str::upper(Str::slug($model->name,'_'));
        });
    }

    public function options(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? collect(json_decode($value, true)) : null,
            set: fn($value) => $value ? json_encode($value) : null,
        );
    }

    public function eventType(): BelongsTo
    {
        return $this->belongsTo(EventType::class);
    }


}
