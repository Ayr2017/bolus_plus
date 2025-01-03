<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bolus extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'version',
        'batch_number',
        'produced_at',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    protected $table='boluses';
}
