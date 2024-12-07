<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restriction extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'title',
        'icon',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
