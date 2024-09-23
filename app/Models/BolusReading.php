<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BolusReading extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'device_number',
        'RSSI',
        'VB',
        'AmM',
        'CmM',
        'AdX',
        'AdY',
        'AdZ',
        'CdX',
        'CdY',
        'CdZ',
        'PH',
        'PN',
        'UT',
    ];

    protected $casts = [
        'RSSI' => 'float',
        'VB' => 'float',
        'AmM' => 'float',
        'CmM' => 'float',
        'AdX' => 'float',
        'AdY' => 'float',
        'AdZ' => 'float',
        'CdX' => 'float',
        'CdY' => 'float',
        'CdZ' => 'float',
        'PH' => 'float',
        'PN' => 'float',
        'UT' => 'float',
    ];
}
