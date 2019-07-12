<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Donor as DonorResource;

class DonorPersonalDetails extends JsonResource
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
            'sex' => $this->sex,
            'civil_status' => $this->civil_status,
            'contact_number' => $this->contact_number,
            'occupation' => $this->occupation,
            'nationality' => $this->nationality,
            'donor' =>  new DonorResource($this->donor),


        ];
    }
}
