<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserHolidayRequest;
use App\Http\Resources\UserHolidayCollection;
use App\Http\Resources\UserHolidayResource;
use App\Models\UserHoliday;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserHolidayController extends Controller
{
    public function index(Request $request): ResourceCollection
    {
        return new UserHolidayCollection($request->user()->holidays);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserHolidayRequest $request)
    {
        $data = $request->validated();
        $request->user()->holidays()->create([
            'start_date' => $data['start_date'],
            'start_date_period' => $data['start_date_period'],
            'end_date' => $data['end_date'],
            'end_date_period' => $data['end_date_period'],
            'reason' => $data['reason'],
        ]);

        return \Illuminate\Http\Response::HTTP_CREATED;
    }

    public function show(UserHoliday $userHoliday): JsonResource
    {
        return new UserHolidayResource($userHoliday);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserHoliday  $userHoliday
     * @return \Illuminate\Http\Response
     */
    public function edit(UserHoliday $userHoliday)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserHoliday  $userHoliday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserHoliday $userHoliday)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserHoliday  $userHoliday
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserHoliday $userHoliday)
    {
        //
    }
}
