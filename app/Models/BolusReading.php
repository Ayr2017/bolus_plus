<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    protected $casts = [
        'rssi' => 'float',
        'vb' => 'float',
        'amm' => 'float',
        'cmm' => 'float',
        'adx' => 'float',
        'ady' => 'float',
        'adz' => 'float',
        'cdx' => 'float',
        'cdy' => 'float',
        'cdz' => 'float',
        'ph' => 'float',
        'pn' => 'float',
        'ut' => 'float',
    ];
}
