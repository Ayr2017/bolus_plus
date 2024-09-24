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

}
