<?php

namespace App\Http\Requests\AnimalGroup;

use Illuminate\Foundation\Http\FormRequest;

class ShowAnimalGroupRequest extends FormRequest
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
            'animal_group' => ['required', 'integer', 'exists:animal_groups,id'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'animal_group' => $this->route('animal_group')->id,
        ]);
    }
}
