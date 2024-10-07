<?php

namespace App\Models\Event;

use App\Models\Event;
use App\Models\Restriction;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

//TODO:: заполнить нужными данными. Копия.
class Heat extends Event
{
    use HasFactory;

    protected $casts = [
        'data' => 'collection',
    ];

    const STORE_RULES = [
        'data.start_at' => 'required|date',
        'data.end_at' => 'required|date',
        'data.restriction_start_at' => 'required|date',
        'data.restriction_end_at' => 'required|date',
        'data.status_id' => 'required|integer',
        'data.restriction_id' => 'required|exists:restrictions,id',
        'data.restricted_by' => 'required|string',
        'data.description' => 'nullable|string',
    ];
    const UPDATE_RULES = [
        'data.start_at' => 'nullable|date',
        'data.end_at' => 'nullable|date',
        'data.restriction_start_at' => 'nullable|date',
        'data.restriction_end_at' => 'nullable|date',
        'data.status_id' => 'nullable|integer',
        'data.restriction_id' => 'nullable|exists:restrictions,id',
        'data.restricted_by' => 'nullable|string',
        'data.description' => 'nullable|string',
    ];

    public function restrictedBy(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->data->get('restricted_by'),
        );
    }
    public function restrictionId(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->data->get('restriction_id'),
        );
    }
    public function statusId(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->data->get('status_id'),
        );
    }
    public function restrictionStartAt(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::make($this->data->get('restriction_start_at'))?->format('Y-m-d H:i:s'),
        );
    }
    public function restrictionEndAt(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::make($this->data->get('restriction_end_at'))?->format('Y-m-d H:i:s'),
        );
    }

    public function restrictor():BelongsTo
    {
        return $this->belongsTo(User::class, 'restricted_by', 'id');
    }
    public function restriction():BelongsTo
    {
        return $this->belongsTo(Restriction::class, 'restriction_id', 'id');
    }

    public function status():BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

}
