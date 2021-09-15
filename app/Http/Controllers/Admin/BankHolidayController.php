<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankHoliday;
use Illuminate\Http\Request;

class BankHolidayController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'year' => ['sometimes', 'nullable', 'digits:4', 'integer', 'min:' . (date('Y'))],
        ]);

        $year = $request->year;

        $baseQuery = BankHoliday::query();

        $bankHolidays = $year ?  $baseQuery->whereYear('date', $year)->get() : $baseQuery->get();
        dd($bankHolidays);

    }
}
