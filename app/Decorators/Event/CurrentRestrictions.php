<?php

namespace App\Decorators\Event;

use App\Models\Event;
use Illuminate\Support\Str;

class CurrentRestrictions implements EventDecoratorInterface
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
            'Restricted by:' => $this->event->restrictor?->fullName,
            'Restriction:' => Str::title($this->event->restriction?->name),
            'Status:' => Str::title($this->event->status?->name),
            'Restriction start at:' => $this->event->restriction_start_at,
            'Restriction end at:' => $this->event->restriction_end_at
        ];
    }
}
