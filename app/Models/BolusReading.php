<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class BolusReading extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'date',
        'device_number',
        'rssi',
        'vb',
        'amm',
        'cmm',
        'adx',
        'ady',
        'adz',
        'cdx',
        'cdy',
        'cdz',
        'ph',
        'pn',
        'ut',
    ];

    public function date():Attribute
    {
        return Attribute::make(
            get: fn($value)=>Carbon::make($value)->format('Y-m-d'),
        );
    }

    public function bolus(): BelongsTo
    {
        return $this->belongsTo(Bolus::class, 'device_number', 'device_number');
    }
    public function animal():HasOneThrough
    {
        return $this->hasOneThrough(
            Animal::class,  // Целевая модель (Animal)
            Bolus::class,   // Промежуточная модель (Bolus)
            'device_number', // Поле в таблице boluses для связи с bolus_readings
            'id',            // Поле в таблице animals для связи с boluses
            'device_number', // Локальный ключ в таблице bolus_readings для связи с boluses
            'id'             // Поле в таблице boluses для связи с animals (не 'bolus_id')
        );
    }

}
