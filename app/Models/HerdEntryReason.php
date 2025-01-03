<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HerdEntryReason extends Model
{
    protected $fillable = ['name', 'description', 'is_active'];
    protected $casts = [
        'is_active' => 'bool',
    ];
}
