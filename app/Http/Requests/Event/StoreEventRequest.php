<?php

namespace App\Http\Requests\Event;

use AllowDynamicProperties;
use App\Models\EventType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

#[AllowDynamicProperties] class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_merge([
            'event_type_id' => 'required|exists:event_types,id',
            'event_category' => 'required|string',
        ], $this->getRules());
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'event_category' => 'MANUAL',
        ]);
    }


    public function getRules(): array
    {
        $eventTypeSlug = EventType::find($this->event_type_id)->slug;
        $event = App::make('App\Models\Event\\'.Str::studly(Str::lower($eventTypeSlug)));
        return array_filter($event::STORE_RULES);
    }

}
