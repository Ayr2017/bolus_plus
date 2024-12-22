<?php

namespace App\Http\Requests\StructuralUnit;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStructuralUnitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasRole('admin');
    }

    /**
     * Define the validation rules for the Bolus\App application.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string','max:255', 'unique:structural_units,name,'.$this->structural_units],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
