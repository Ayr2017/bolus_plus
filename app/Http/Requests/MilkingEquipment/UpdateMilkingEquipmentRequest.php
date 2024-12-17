<?php

namespace App\Http\Requests\MilkingEquipment;

use App\Enums\EquipmentType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMilkingEquipmentRequest extends FormRequest
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
            'organization_id' => ['required', 'exists:organisations,id'],
            'department_id' => ['required', 'exists:organisations,id'],
            'equipment_type' => ['required', Rule::enum(EquipmentType::class)],
            'milking_places_amount' => ['required', 'numeric'],
            'milking_per_day_amount' => ['required', 'numeric'],
        ];
    }
}
