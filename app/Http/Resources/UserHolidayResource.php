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
            'start_date' => $this->start_date->format('d/m/Y'),
            'start_date_period' => $this->start_date_period,
            'end_date' => $this->end_date->format('d/m/Y'),
            'end_date_period' => $this->end_date_period,
            'reason' => $this->reason,
            'user' => new UserResource($this->user),
            'approved' => $this->approved,
            'approved_by' => optional($this->user()->where('id', $this->approved_by)->first())->name,
            'approved_at' => optional($this->approved_at)->format('d/m/Y'),
        ];
    }
}
