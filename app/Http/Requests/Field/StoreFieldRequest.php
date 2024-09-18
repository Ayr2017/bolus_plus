<?php

namespace App\Http\Requests\Field;

use Illuminate\Foundation\Http\FormRequest;

class StoreFieldRequest extends FormRequest
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
            'name' => 'required|string|unique:fields,name',
            'number' => 'nullable|integer',
            'title' => 'required|string|unique:fields,title',
            'event_type_id' => 'required|exists:event_types,id',
            'options' => 'nullable|array',
            'description' => 'nullable|string',
        ];
    }

    public function prepareForValidation():void
    {
        $optionsArray = explode(',',$this->options);
        $options = [];
        foreach ($optionsArray as $option) {
            $options[] = trim($option);
        }
        $options = array_filter(array_unique($options));
        $this->merge([
            'options' => $options ?? [],
        ]);
    }
}
