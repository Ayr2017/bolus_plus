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
        'data.insemination_start_at' => 'required|date',
        'data.insemination_end_at' => 'required|date|after:data.insemination_start_at',
        'data.status_id' => 'nullable|integer',
        'data.is_inseminated' => 'nullable|boolean',
    ];
    const UPDATE_RULES = [
        'data.start_at' => 'nullable|date',
        'data.end_at' => 'nullable|date',
        'data.insemination_start_at' => 'nullable|date',
        'data.insemination_end_at' => 'nullable|date|after:data.insemination_start_at',
        'data.status_id' => 'nullable|integer',
        'data.is_inseminated' => 'nullable|boolean',
    ];

    public function statusId(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->data->get('status_id'),
        );
    }
    public function inseminationStartAt(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::make($this->data->get('insemination_start_at'))?->format('Y-m-d H:i:s'),
        );
    }
    public function inseminationEndAt(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::make($this->data->get('insemination_end_at'))?->format('Y-m-d H:i:s'),
        );
    }

    public function status():BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

}
