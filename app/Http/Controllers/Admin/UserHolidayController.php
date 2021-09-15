<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserHoliday;

class UserHolidayController extends Controller
{
    public function approve(UserHoliday $userHoliday)
    {
        $this->authorize('approve', $userHoliday);

        $userHoliday->update([
            'status' => UserHoliday::APPROVED,
            'approved_at' => now(),
            'reviewed_by' => auth()->id(),
        ]);

        return response('Holiday request approved.', \Illuminate\Http\Response::HTTP_OK);
    }

    public function reject(UserHoliday $userHoliday)
    {
        $this->authorize('reject', $userHoliday);

        $userHoliday->update([
            'status' => UserHoliday::REJECTED,
            'approved_at' => null,
            'reviewed_by' => auth()->id(),
        ]);
    }
}
