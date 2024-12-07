<?php

namespace App\Http\Requests\RestrictionReason;

use Illuminate\Foundation\Http\FormRequest;

class DeleteRestrictionReasonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'restriction_reason' => ['required', 'integer' ,'exists:restriction_reasons,id']
        ];
    }

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'restriction_reason' => $this->route('restriction_reason')->id,
        ]);
    }
}
