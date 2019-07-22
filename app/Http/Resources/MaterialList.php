<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Material as MaterialResource;

class MaterialList extends JsonResource
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
            'material_id' => $this->material_id,
            'quantity' => $this->quantity,
            'mbd_schedule_id' => $this->mbd_schedule_id,

            'material' => new MaterialResource($this->material)
        ];
    }
}
