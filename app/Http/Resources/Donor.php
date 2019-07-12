<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DonationCollect;

class Donor extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,  
            'donor_id' => $this->donor_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'full_name' => $this->last_name . ", " . $this->first_name,

            'personal_details' => $this->donor_personal_details,
            'donations' => new DonationCollection($this->donations)
          ];    
    }
}
