<?php

namespace App\Modules\Event\DataObject;

use Illuminate\Support\Collection;

class CurrentRestrictionDataObject extends EventDataObject
{

    /**
     * @var array|string[]
     */
    protected array $validationRules = [
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after:start_date',
        'reason' => 'required|string|in:Age,Launch,Diagnosis',
        'restriction' => 'required|string',
        'note' => 'nullable|string|max:255',
    ];

    /**
     * @return Collection
     */
    public function fields(): Collection
    {
        $fields = [
            'label' => 'Текущие ограничения',
            'rules' => $this->validationRules, // Используем сохраненные правила
        ];

        return collect($fields);
    }

    /**
     * @return array|string[]
     */
    public function rules(): array
    {
        return $this->validationRules; // Просто возвращаем сохраненные правила
    }
}
