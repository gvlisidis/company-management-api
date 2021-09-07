<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserHolidayRequest;
use App\Http\Requests\UpdateUserHolidayRequest;
use App\Http\Resources\UserHolidayCollection;
use App\Http\Resources\UserHolidayResource;
use App\Models\UserHoliday;
use App\Services\UserHolidayService;
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
     * @param  StoreUserHolidayRequest  $request
     * @param  UserHolidayService  $userHolidayService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(StoreUserHolidayRequest $request, UserHolidayService $userHolidayService)
    {
        $data = $request->validated();

        try {
            $userHolidayService->sendHolidayRequest($data);

            return response('Holiday requested.', \Illuminate\Http\Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function show(UserHoliday $userHoliday): JsonResource
    {
        $this->authorize('view', $userHoliday);

        return new UserHolidayResource($userHoliday);
    }

    /**
     * @param  UpdateUserHolidayRequest  $request
     * @param  UserHoliday  $userHoliday
     * @param  UserHolidayService  $userHolidayService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(
        UpdateUserHolidayRequest $request,
        UserHoliday $userHoliday,
        UserHolidayService $userHolidayService
    ) {
        $this->authorize('update', $userHoliday);
        $data = $request->validated();
        try {
            $userHolidayService->updateHolidayRequest($userHoliday, $data);

            return response('Holiday request updated.', \Illuminate\Http\Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * @param  UserHoliday  $userHoliday
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(UserHoliday $userHoliday)
    {
        $this->authorize('delete', $userHoliday);
        $userHoliday->delete();

        return response('Holiday request deleted.', \Illuminate\Http\Response::HTTP_OK);
    }
}
