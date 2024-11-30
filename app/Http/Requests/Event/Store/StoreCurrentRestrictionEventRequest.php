<?php

namespace App\Http\Requests\Event\Store;

use App\Http\Requests\Event\StoreEventRequest;

final class StoreCurrentRestrictionEventRequest extends StoreEventRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
