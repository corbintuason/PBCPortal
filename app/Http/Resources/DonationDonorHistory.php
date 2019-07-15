<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Donation as DonationResource;

class DonationDonorHistory extends JsonResource
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
            'donation_id' => $this->donation_id, 
            'answer_1' => $this->answer_1, 
            'answer_2' => $this->answer_2, 
            'answer_3' => $this->answer_3,
            'answer_4' => $this->answer_4, 
            'answer_5' => $this->answer_5, 
            'answer_6' => $this->answer_6,
            'answer_7' => $this->answer_7, 
            'answer_8' => $this->answer_8, 
            'answer_9' => $this->answer_9,
            'answer_10' => $this->answer_10, 
            'answer_11' => $this->answer_11, 
            'answer_12' => $this->answer_12,
            'answer_13' => $this->answer_13, 
            'answer_14' => $this->answer_14, 
            'answer_15' => $this->answer_15,
            'answer_16' => $this->answer_16, 
            'answer_17' => $this->answer_17, 
            'answer_18' => $this->answer_18,
            'answer_19' => $this->answer_19, 
            'answer_20' => $this->answer_20, 
            'answer_21' => $this->answer_21,
            'answer_22' => $this->answer_22, 
            'answer_23' => $this->answer_23, 
            'answer_24' => $this->answer_24,
            'answer_25' => $this->answer_25, 
            'answer_26' => $this->answer_26, 
            'verdict' => $this->verdict, 
            'remarks'=> $this->remarks,

            // 'donation' => new DonationResource($this->donation)
        ];
    }
}
