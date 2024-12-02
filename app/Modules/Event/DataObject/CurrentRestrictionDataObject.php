<?php

namespace App\Modules\Event\DataObject;

use App\Models\Restriction;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CurrentRestrictionDataObject extends EventDataObject
{

    /**
     * @var array|string[]
     */
    protected array $validationRules = [
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after:start_date',
        'reason' => 'required|string|in:Age,Launch,Diagnosis',
        'restriction_id' => 'required|integer|exists:restrictions,id',
        'note' => 'nullable|string|max:255',
    ];

    /**
     * @return Collection
     */
    public function fields(): Collection
    {
        return collect($this->validationRules)->keys();
    }

    /**
     * @return array|string[]
     */
    public function rules(): array
    {
        return $this->validationRules; // Просто возвращаем сохраненные правила
    }

    public function dataArray(): array
    {
        return $this->data;
    }

}
