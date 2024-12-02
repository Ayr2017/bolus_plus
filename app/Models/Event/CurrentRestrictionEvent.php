<?php

namespace App\Models\Event;

use App\Models\Event;
use App\Models\Restriction;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;

class CurrentRestrictionEvent extends Event
{
    use HasFactory;

    protected array $validationRules = [
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after:start_date',
        'reason' => 'required|string|in:Age,Launch,Diagnosis',
        'restriction_id' => 'required|integer|exists:restrictions,id',
        'note' => 'nullable|string|max:255',
    ];

    public function fields(): array
    {
        return array_keys($this->validationRules);
    }

    public function restrictionId(): Attribute
    {
        return Attribute::make(
            get: fn () => Arr::get($this->data, 'restriction_id'),
        );
    }

    public function restriction():BelongsTo
    {
        return $this->belongsTo(Restriction::class);
    }
}
