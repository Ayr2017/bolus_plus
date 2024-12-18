<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shift extends Model
{
    protected $fillable = ['is_active', 'organization_id', 'department_id', 'start_time', 'end_time', 'name'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function organization() :BelongsTo
    {
        return $this->belongsTo(Organisation::class, 'organization_id');
    }

    public function department() :BelongsTo
    {
        return $this->belongsTo(Organisation::class, 'department_id');
    }
}
