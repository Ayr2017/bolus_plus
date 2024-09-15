<?php

namespace App\Http\Requests\Event;

use AllowDynamicProperties;
use App\Enums\EventCategoriesEnum;
use App\Enums\EventTypesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;
use ReflectionEnum;

#[AllowDynamicProperties] class StoreEventRequest extends FormRequest
{
    public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
    {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
        $eventType = request()->request->get('event_type') ?? null;
        if($eventType) {
            $this->strategy = App::make('\App\Strategies\\'.$eventType.'Strategy');
        }
    }

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
        ], $this->getRules());
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'event_category' => (EventCategoriesEnum::MANUAL)->name,
        ]);
    }

    private function getRules(): array
    {
        return $this->strategy->validateData('store');
    }
}
