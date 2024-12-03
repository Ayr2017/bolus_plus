<?php

namespace App\Models\Event;

use App\Models\Event;
use App\Models\Restriction;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;

/*
 *
 */
class CurrentRestrictionEvent extends Event
{
    use HasFactory;

    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    protected $appends = [
        'restriction'
    ];

    protected array $dataValidationRules = [
        'data.start_date' => 'required|date',
        'data.end_date' => 'nullable|date|after:start_date',
        'data.reason' => 'required|string|in:Age,Launch,Diagnosis',
        'data.restriction_id' => 'required|integer|exists:restrictions,id',
        'data.note' => 'nullable|string|max:255',
    ];

    public function fields(): array
    {
        return array_keys($this->validationRules);
    }

    public function getDataFields(): array
    {
        return array_keys($this->dataValidationRules);
    }
    public function getDataValidationRules(): array
    {
        return $this->dataValidationRules;
    }

    public function getAppends(): array
    {
        return $this->appends;
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
