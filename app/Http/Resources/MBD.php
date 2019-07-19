<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DonationList as DonationListResource;
use App\Http\Resources\MBDSchedule as MBDScheduleResource;
use App\Http\Resources\Agency as AgencyResource;

class MBD extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'category' => $this->category,
            'agency_id' => $this->agency_id,
            'status' => $this->status,
            'date_requested' => $this->created_at,

            'schedules' => MBDScheduleResource::collection($this->mbd_schedules),
            'agency' => new AgencyResource($this->agency),
            'donation_list' => DonationListResource::collection($this->donation_list)
        ];
    }
}
