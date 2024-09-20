<?php

namespace App\Entity\EventData;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class Heat extends EventData implements EventDataInterface
{
    public string $name = 'Heat';
    public string $view = 'heat';
    public bool $is_inseminated;
    public $start_at;
    public  $end_at;
    public  $insemination_start_at;
    public  $insemination_end_at;

    public function __construct(array $data)
    {
        parent::__construct($data);
        foreach ($data as $field => $value) {
            $this->$field = $value;
        }
    }

    public function isInseminated():Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  $value ? 'YES'  : 'NO',
        );
    }
    public function startAt():Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::make($value)?->format('Y-m-d H:i:s') ?? null,
        );
    }

//    public array $storeRules = [
//        'data.start_at' => 'required|date',
//        'data.end_at' => 'required|date',
//        'data.insemination_start_at' => 'required|date',
//        'data.insemination_end_at' => 'required|date',
//        'date.is_inseminated' => 'nullable|boolean',
//
//    ];
//    public array $updateRules = [
//        'data.start_at' => 'nullable|date',
//        'data.end_at' => 'nullable|date',
//        'data.insemination_start_at' => 'nullable|date',
//        'data.insemination_end_at' => 'required|date',
//        'date.is_inseminated' => 'nullable|boolean',
//    ];
}
