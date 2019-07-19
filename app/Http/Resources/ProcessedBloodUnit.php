<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProcessedBloodUnit extends JsonResource
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
            'whole_blood' => $this->whole_blood,
            'packed_rbc' => $this->packed_rbc,
            'platelet_concentrate' => $this->platelet_concentrate,
            'ffp' => $this->ffp,
            'cryoprecipitate' => $this->cryoprecipitate,
            'cryosupernate' => $this->cryosupernate,
            'blood_unit_id' => $this->blood_unit_id
        ];
    }
}
