<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\MBD as MBDResource;
use App\Http\Resources\DonationDonorHistory as DonationDonorHistoryResource;


class MBDDonation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'donor_id' => $this->donor_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'mbd_id' => $this->mbd_id,

            'donor' => new UserResource($this->donor),
            'donation_donor_history' => new DonationDonorHistoryResource($this->donation_donor_history),
            'mbd' => $this->mbd
        ];
    }
}
