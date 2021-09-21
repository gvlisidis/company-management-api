<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankHolidayRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dates' => ['array', 'sometimes', 'nullable', 'unique:bank_holidays,date'],
        ];
    }

    public function messages()
    {
        return [
            'dates.unique' => 'At least one of the dates exists.'
        ];
    }
}
