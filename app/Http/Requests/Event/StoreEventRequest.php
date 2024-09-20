<?php

namespace App\Http\Requests\Event;

use AllowDynamicProperties;
use App\Entity\EventData\EventDataInterface;
use App\Enums\EventCategoriesEnum;
use App\Enums\EventTypesEnum;
use App\Models\EventType;
use App\Models\Field;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\NoReturn;
use ReflectionEnum;

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
        $rules = EventType::with('fields')->find($this->event_type_id)->fields->pluck('rule_store','name')->toArray();
        return array_filter($rules);
    }
}
