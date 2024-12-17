<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MilkingEquipment extends Model
{
    protected $fillable = ['is_active', 'organization_id', 'department_id', 'equipment_type', 'milking_places_amount', 'milking_per_day_amount'];

    public function organization() :BelongsTo
    {
        return $this->belongsTo(Organisation::class, 'organization_id');
    }
}
