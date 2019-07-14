<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MBDDonation as MBDDonationResource;

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
            'agency' => $this->agency,
            
            'mbd_donations' => MBDDonationResource::collection($this->mbd_donations)
        ];
    }
}
