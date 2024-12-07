<?php

namespace App\Http\Requests\AnimalGroup;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnimalGroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:animal_groups,name,' . $this->animal_group],
            'description' => ['nullable', 'string'],
            'animal_group' => ['required', 'integer', 'exists:animal_groups,id'],
            'is_active'=>['nullable','boolean'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'animal_group' => $this->route('animal_group'),
        ]);
    }
}
