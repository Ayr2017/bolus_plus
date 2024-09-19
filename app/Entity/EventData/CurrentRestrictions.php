<?php

namespace App\Entity\EventData;

class CurrentRestrictions implements EventData
{
    public string $name = 'CurrentRestrictions';
    public string $view = 'current-restrictions';
    public array $storeRules = [
        'data.start_at' => 'required|date',
        'data.end_at' => 'required|date',
        'data.restriction_start_at' => 'required|date',
        'data.restriction_end_at' => 'required|date',
        'data.status_id' => 'required|integer',
        'data.restriction_id' => 'required|exists:restrictions,id',
        'data.restricted_by' => 'required|string',
    ];
    public array $updateRules = [
        'data.start_at' => 'nullable|date',
        'data.end_at' => 'nullable|date',
        'data.restriction_start_at' => 'nullable|date',
        'data.restriction_end_at' => 'nullable|date',
        'data.status_id' => 'nullable|integer',
        'data.restriction_id' => 'nullable|exists:restrictions,id',
        'data.restricted_by' => 'nullable|string',
    ];
}
