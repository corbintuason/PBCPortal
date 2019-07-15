<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Donor;
use App\DonationDonorHistory;

class Donation extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "donations";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'donor_id', 'status'
     ];

     public function donor(){
          return $this->belongsTo(User::class, 'donor_id');
     }

     public function donation_donor_history(){
          return $this->hasOne(DonationDonorHistory::class);
     }

     public function donation_list(){
          return $this->belongsTo(DonationList::class);
     }
}
