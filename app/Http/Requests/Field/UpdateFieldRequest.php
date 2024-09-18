<?php

namespace App\Http\Requests\Field;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFieldRequest extends FormRequest
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
            'name' => 'nullable|string|unique:fields,name',
            'number' => 'nullable|integer',
            'title' => 'nullable|string|unique:fields,title',
            'event_type_id' => 'nullable|exists:event_types,id',
            'options' => 'nullable|array',
            'description' => 'nullable|string',
        ];
    }
}
