<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetBankHolidaysRequest;
use App\Http\Requests\StoreBankHolidayRequest;
use App\Http\Resources\BankHolidayResource;
use App\Models\BankHoliday;

class BankHolidayController extends Controller
{
    public function index(GetBankHolidaysRequest $request)
    {
        $year = $request->year;
        $baseQuery = BankHoliday::query();
        $bankHolidays = $year ?  $baseQuery->whereYear('date', $year)->get() : $baseQuery->get();

        return BankHolidayResource::collection($bankHolidays);
    }

    public function store(StoreBankHolidayRequest $request)
    {
        $dates = $request->dates;

       foreach ($dates as $date) {
           BankHoliday::create(['date' => $date]);
       }


        return response('Bank Holidays Added.', \Illuminate\Http\Response::HTTP_CREATED);
    }
}
