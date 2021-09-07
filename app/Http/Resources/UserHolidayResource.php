<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserHolidayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'start_date' => $this->start_date,
            'start_date_period' => $this->start_date_period,
            'end_date' => $this->end_date,
            'end_date_period' => $this->end_date_period,
            'reason' => $this->reason,
            'user' => new UserResource($this->user),
        ];
    }
}
