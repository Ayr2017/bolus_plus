<?php

namespace App\Http\Requests\EventType;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventTypeRequest extends FormRequest
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
            'name' => 'required|string|unique:event_types,name',
            'description' => 'nullable|string',
            'slug' => 'nullable|string|unique:event_types,slug',
            'icon' => 'nullable|string',
        ];
    }
}
