<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ManpowerList as ManpowerListResource;
use App\Http\Resources\DonationList as DonationListResource;
use App\Http\Resources\MaterialList as MaterialListResource;

class MBDSchedule extends JsonResource
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
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'venue' => $this->venue,
            'expectedDonors' => $this->expectedDonors,
            'mbd_id' => $this->mbd_id,
            'mbd' => $this->mbd,

            'total_syringes' => $this->totalSyringes(),
            'total_barcodes' => $this->totalBarcodes(),
            'total_blood_bags' => $this->totalBloodBags(),

            'category' => $this->category(),
            'manpower_list' => ManpowerListResource::collection($this->manpower_list),
            'donation_list' => DonationListResource::collection($this->donation_list),
            'material_list' => MaterialListResource::collection($this->material_list)
        ];
    }
}
