<?php

namespace App\Entity\EventData;

use App\Models\EventType;
use App\Models\Field;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Heat extends EventData implements EventDataInterface
{
    public string $name = 'Heat';
    public string $view = 'heat';

    public array $storeRules = [
        'data.start_at' => 'required|date',
        'data.end_at' => 'required|date',
        'data.insemination_start_at' => 'required|date',
        'data.insemination_end_at' => 'required|date',
        'date.is_inseminated' => 'nullable|boolean',

    ];
    public array $updateRules = [
        'data.start_at' => 'nullable|date',
        'data.end_at' => 'nullable|date',
        'data.insemination_start_at' => 'nullable|date',
        'data.insemination_end_at' => 'required|date',
        'date.is_inseminated' => 'nullable|boolean',
    ];
}
