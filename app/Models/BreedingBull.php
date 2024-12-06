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
        'seed_code',
        'rshn_id',
        'color',
        'breed_id',
        'is_selected',
    ];
}
