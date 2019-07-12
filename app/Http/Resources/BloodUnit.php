<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BloodUnit extends JsonResource
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
            'donation_id' => $this->donation_id,
            'whole_blood' => $this->whole_blood,
            'status' => $this->status,
            'quantity' => $this->quantity,
            'donor_id' => $this->donor_id,
            'blood_type' => $this->typed_blood_unit["ABO"].$this->typed_blood_unit["rh_type"],

            'typed_blood_unit' => $this->typed_blood_unit,
            'processed_blood_unit' => $this->processed_blood_unit,
            'tested_blood_unit' => $this->tested_blood_unit
        ];
    }

    public function with($request){
        return[
            'lulz' => 'haha'
        ];
    }
}
