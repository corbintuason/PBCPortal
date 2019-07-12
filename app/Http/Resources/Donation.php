<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Donor as DonorResource;
class Donation extends JsonResource
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

            'donor' => new DonorResource($this->donor)
        ];
    }
}
