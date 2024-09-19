<?php

namespace App\View\Components\Event;

use AllowDynamicProperties;
use App\Models\Restriction;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

#[AllowDynamicProperties] class Data extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected string $eventType,
    )
    {
        $this->restrictions = Restriction::query()->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $formName = Str::kebab(Str::camel(Str::lower($this->eventType)));
        //TODO: если есть файл то
        return view("events.partials.data.$formName",[
            'restrictions' => $this->restrictions,
        ]);
        //TODO: если нет, то вернуть пустой с ошибкой
    }
}
