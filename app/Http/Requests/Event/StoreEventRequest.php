<?php

namespace App\Http\Requests\Event;

use App\Enums\EventCategoriesEnum;
use App\Enums\EventTypesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;
use ReflectionEnum;

class StoreEventRequest extends FormRequest
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
            'description' => 'required|string',
            'event_type' => 'required|string',
            'event_category' => 'required|string',
        ],$this->getRules());
    }

    private function getRules(): array
    {
        $eventType = $this->event_type;
        if($eventType){
            return (new ( (new ReflectionEnum(EventTypesEnum::class))->getCase($eventType)->getValue()->value))::STORE_RULES;
        }
        return [];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'event_category' => (EventCategoriesEnum::MANUAL)->name,
        ]);
    }
}
