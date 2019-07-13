<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TypedBloodUnit extends JsonResource
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
            'ABO' => $this->ABO,
            'rh_type' => $this->rh_type,
            'blood_unit_id' => $this->blood_unit_id
        ];
    }
}
