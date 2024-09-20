<?php

namespace App\View\Components\Event;

use AllowDynamicProperties;
use App\Models\Restriction;
use App\Models\Status;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
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
        $this->statuses = Status::query()->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $formName = Str::kebab(Str::camel(Str::lower($this->eventType)));
        if (view()->exists("events.partials.data.$formName")) {
            return view("events.partials.data.$formName", $this->getData($this->eventType));
        } else {
            return back()->withErrors(['message' => 'view does not exists.']);
        }
    }

    public function getData(string $eventType): array
    {
        $data = [
            'event_type' => $this->eventType,
        ];

        switch ($eventType) {
            case 'HEAT':
                break;
            case 'CURRENT_RESTRICTIONS':
                $data['restrictions'] = Restriction::query()->get();
                $data['statuses'] = Status::query()->get();
                break;
        };

        return $data;
    }
}
