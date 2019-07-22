<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin as AdminResource;

class ManpowerList extends JsonResource
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
            'date_assigned' => $this->date_assigned,
            'mbd_schedule_id' => $this->mbd_schedule_id,
            'admin_id' => $this->admin_id,

            'admin' => new AdminResource($this->admin)
        ];
    }
}
