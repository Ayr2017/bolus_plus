<?php

namespace App\Entity\EventData;

class Field
{
    public string $name;
    public string $title;
    public string $slug;
    public string $eventType;
    public string $dataType;

    public function __construct(string $name = null, string $title = null, string $slug = null, string $eventType = null, string $dataType = null)
    {
        $this->name = $name;
        $this->title = $title;
        $this->slug = $slug;
        $this->eventType = $eventType;
        $this->dataType = $dataType;
    }
}
