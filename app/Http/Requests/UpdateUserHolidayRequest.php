<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserHolidayRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'start_date' => ['date'],
            'start_date_period' => ['string', Rule::in(['AM', 'PM'])],
            'end_date' => ['date', 'after_or_equal:start_date'],
            'end_date_period' => ['string', Rule::in(['AM', 'PM'])],
            'reason' => ['string', 'nullable', 'sometimes'],
        ];
    }
}
