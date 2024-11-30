<?php

namespace App\Http\Requests\ZootechnicalExitReason;

use Illuminate\Foundation\Http\FormRequest;

class StoreZootechnicalExitReasonRequest extends FormRequest
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
            'name' => 'required|string|unique:zootechnical_exit_reasons,name',
            'description' => 'nullable|string',
        ];
    }
}
