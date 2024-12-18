<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Milking extends Model
{
    protected $fillable = ['is_active', 'organization_id', 'department_id', 'shift_id', 'start_time', 'end_time'];

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

    public function shift() :BelongsTo
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }
}
