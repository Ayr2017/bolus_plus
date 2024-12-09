<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreedingBull extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'seed_supplier',
        'nickname',
        'date_of_birth',
        'country_of_birth',
        'tag_number',
        'semen_code',
        'rshn_id',
        'coat_color_id',
        'breed_id',
        'is_selected',
        'is_active',
        'is_own'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_own' => 'boolean'
    ];
}
