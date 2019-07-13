<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DonorCollection;
use App\Http\Resources\Donation as DonationResource;
class DonationList extends JsonResource
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
            'donation_id' => $this->donation_id,
            'mbd_id' => $this->mbd_id,
            
            'donation' => new DonationResource($this->donation),
        ];
    }
}
