<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Donation as DonationResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $role = $this->roles[0]->name;
        return [
            'id' => $this->id,  
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'full_name' => $this->last_name . ", " . $this->first_name,

            'personal_details' => $this->donor_personal_details,
            // 'donations' => DonationResource::collection($this->donations)
            'donations' => $this->donations,

            'agencies' => $this->agencies
          ];     
    }
}
