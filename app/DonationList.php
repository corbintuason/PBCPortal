<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Donor;
use App\MBD;

class DonationList extends Model
{
    // Primary Key 
    public $primaryKey = "id";
    // Event Name
    protected $table = "donation_lists";
    // Primary Key 
    public $timestamps = true;
    
    protected $fillable =[
    'donation_id', 'mbd_id', 'mbd_schedule_id'
    ];

    public function mbd(){
        return $this->belongsTo(MBD::class);
    }

   public function donation(){
       return $this->belongsTo(Donation::class);
   }
}
