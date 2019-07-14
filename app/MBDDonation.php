<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Donor;
use App\MBD;

class MBDDonation extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "mbd_donations";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'donor_id', 'status', 'mbd_id'
     ];

     public function donor(){
          return $this->belongsTo(User::class, 'donor_id');
     }
     // public function mbd(){
     //      return $this->belongsTo(MBD::class, 'mbd_id');
     // }
}
