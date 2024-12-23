<?php

namespace App\Http\Requests\Bolus;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBolusRequest extends FormRequest
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
            'number' => 'string|required|unique:boluses,number'.$this->id,
            'version' => 'string|required',
            'batch_number' => 'string|required',
            'produced_at' => 'string|required|date',
            'is_active'=>['nullable','boolean'],
        ];
    }
}
