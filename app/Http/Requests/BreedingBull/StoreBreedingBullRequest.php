<?php

namespace App\Http\Requests\BreedingBull;

use Illuminate\Foundation\Http\FormRequest;

class StoreBreedingBullRequest extends FormRequest
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
        return [
            'type' => 'required|string|max:255', // Тип (обязательное строковое поле)
            'semen_supplier' => 'nullable|string|max:255', // Поставщик семени (необязательное строковое поле)
            'nickname' => 'required|string|max:255', // Кличка (необязательное строковое поле)
            'date_of_birth' => 'nullable|date', // Дата рождения (необязательное поле, должно быть в формате даты)
            'country_of_birth' => 'nullable|string|max:255', // Страна рождения (необязательное строковое поле)
            'tag_number' => 'nullable|string|max:255', // Номер бирки (необязательное строковое поле)
            'semen_code' => 'nullable|string|max:255', // Код семени (необязательное строковое поле)
            'rshn_id' => 'nullable|string|unique:breeding_bulls,rshn_id|max:255', // Идентификационный номер РСХН (обязательное уникальное строковое поле) // upd rshn_id - необязательно, но уникально
            'coat_color_id' => 'nullable|exists:coat_colors,id', // Масть (необязательное строковое поле)
            'breed_id' => 'nullable|exists:breeds,id', // Порода (необязательное поле, ссылается на таблицу пород)
            'is_selected' => 'nullable|boolean', // Флаг выбора (необязательное булево поле)
            'is_own' => 'nullable|boolean'
        ];
    }
}
