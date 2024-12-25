<?php

namespace App\Http\Requests\BreedingBull;

use Illuminate\Foundation\Http\FormRequest;

class DeleteBreedingBullRequest extends FormRequest
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
//        return [
//            // Мы проверяем, что сущность с данным ID существует
//            'breeding_bull' => 'required|exists:breeding_bulls,id', // ID записи должен существовать в базе данных
//        ];
    }
}
