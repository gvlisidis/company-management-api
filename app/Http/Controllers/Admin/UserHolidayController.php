<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserHoliday;
use Illuminate\Http\Request;

class UserHolidayController extends Controller
{
    public function approve(UserHoliday $userHoliday)
    {
        $this->authorize('approve', $userHoliday);

        $userHoliday->update([
            'approved' => true,
            'approved_at' => now(),
            'approved_by' => auth()->id(),
        ]);

        return response('Holiday request approved.', \Illuminate\Http\Response::HTTP_OK);
    }
}
