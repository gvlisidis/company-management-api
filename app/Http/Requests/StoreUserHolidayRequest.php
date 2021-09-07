<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserHolidayRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'start_date' => ['required', 'date', 'before_or_equal:end_date'],
            'start_date_period' => ['required', 'string', Rule::in(['AM', 'PM'])],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'end_date_period' => ['required', 'string', Rule::in(['AM', 'PM'])],
            'reason' => [],
        ];
    }
}
