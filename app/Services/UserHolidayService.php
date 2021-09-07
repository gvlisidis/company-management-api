<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserHoliday;
use App\Notifications\HolidayRequested;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class UserHolidayService
{
    public function sendHolidayRequest($data, $request)
    {
        DB::transaction(function () use ($data, $request) {
            $userHoliday = UserHoliday::create([
                'user_id' => $request->user()->id,
                'start_date' => $data['start_date'],
                'start_date_period' => $data['start_date_period'],
                'end_date' => $data['end_date'],
                'end_date_period' => $data['end_date_period'],
                'reason' => $data['reason'],
            ]);

            Notification::send(User::administrators()->get(), new HolidayRequested($userHoliday));
        });
    }
}
