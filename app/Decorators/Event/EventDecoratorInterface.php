<?php

namespace App\Decorators\Event;

interface EventDecoratorInterface
{
    public function getFieldsArray():array;
    public function setEvent($event):mixed;
}
