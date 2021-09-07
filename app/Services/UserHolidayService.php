<?php

namespace App\Services;

use App\Http\Requests\StoreUserHolidayRequest;
use App\Http\Requests\UpdateUserHolidayRequest;
use App\Models\User;
use App\Models\UserHoliday;
use App\Notifications\HolidayRequested;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class UserHolidayService
{
    public function sendHolidayRequest(array $data)
    {
        DB::transaction(function () use ($data) {
            $userHoliday = UserHoliday::create([
                'user_id' => auth()->id(),
                'start_date' => $data['start_date'],
                'start_date_period' => $data['start_date_period'],
                'end_date' => $data['end_date'],
                'end_date_period' => $data['end_date_period'],
                'reason' => $data['reason'],
            ]);

            Notification::send(User::administrators()->get(), new HolidayRequested($userHoliday));
        });
    }

    public function updateHolidayRequest(UserHoliday $userHoliday, array $data)
    {
        DB::transaction(function () use ($data, $userHoliday) {
            $userHoliday->update([
                'user_id' => auth()->id(),
                'start_date' => $data['start_date'],
                'start_date_period' => $data['start_date_period'],
                'end_date' => $data['end_date'],
                'end_date_period' => $data['end_date_period'],
                'reason' => $data['reason'],
                'status' => UserHoliday::PENDING,
                'approved_at' => null,
                'reviewed_by' => null,
            ]);

            Notification::send(User::administrators()->get(), new HolidayRequested($userHoliday));
        });
    }
}
