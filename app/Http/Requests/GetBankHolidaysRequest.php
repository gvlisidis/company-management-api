<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetBankHolidaysRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'year' => ['sometimes', 'nullable', 'digits:4', 'integer', 'min:' . (date('Y'))],
        ];
    }
}
