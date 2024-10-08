<?php

namespace App\Decorators\Event;

use App\Models\Event;
use Illuminate\Support\Str;

class Heat implements EventDecoratorInterface
{

    public function __construct(protected Event $event)
    {
    }

    public function setEvent($event): mixed
    {
        $this->event = $event;
        return $event;
    }


    public function getFieldsArray(): array
    {
        return [
            'Id:' => $this->event->id,
            'Category:' => $this->event->event_category,
            'Type:' => $this->event->eventType?->name,
            'Creator:' => $this->event->creator?->fullName,
            'Start at:' => $this->event->startAt,
            'End at:' => $this->event->endAt,
            'Status:' => Str::title($this->event->status?->name),
            'Insemination start at:' => $this->event->insemination_start_at,
            'Insemination end at:' => $this->event->insemination_end_at
        ];
    }
}
