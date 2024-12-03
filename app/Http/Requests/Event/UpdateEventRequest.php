<?php

namespace App\Http\Requests\Event;

use App\Models\Event\EventModelFactory;
use Illuminate\Foundation\Http\FormRequest;

#[AllowDynamicProperties]
class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Проверяем, является ли пользователь администратором
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
            'type' => 'required|string',
            'event_category' => 'sometimes|string', // Поле необязательно, но если передано, должно быть строкой
        ], $this->getRules());
    }

    /**
     * Подготовка данных для валидации.
     */
    protected function prepareForValidation()
    {
        // Автоматически добавляем категорию, если она не указана
        if (!$this->has('event_category')) {
            $this->merge([
                'event_category' => 'MANUAL',
            ]);
        }
    }

    /**
     * Получение дополнительных правил валидации из модели события.
     */
    public function getRules(): array
    {
        $eventModel = EventModelFactory::create($this->type);
        return $eventModel->getDataValidationRules();
    }
}

