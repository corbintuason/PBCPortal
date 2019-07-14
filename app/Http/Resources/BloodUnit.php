<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TypedBloodUnit as TypedBloodUnitResource;
use App\Http\Resources\ProcessedBloodUnit as ProcessedBloodUnitResource;
use App\Http\Resources\TestedBloodUnit as TestedBloodUnitResource;


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
            'code' => $this->code,
            'status' => $this->status,
            'typed_blood_unit' => new TypedBloodUnitResource($this->typed_blood_unit),
            'blood_type' => $this->typed_blood_unit->ABO.$this->typed_blood_unit->rh_type,
            'processed_blood_unit' => new ProcessedBloodUnitResource($this->processed_blood_unit),
            'tested_blood_nit' => new TestedBloodUnitResource($this->tested_blood_unit),


        ];
    }

    public function with($request){
        return[
            'lulz' => 'haha'
        ];
    }
}
