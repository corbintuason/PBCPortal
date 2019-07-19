<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agency;
use App\DonationList;
use App\Donation;
use App\MBDSchedule;

class MBD extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "mbds";
     // Primary Key 
     public $timestamps = true;

     protected $casts = [
          'created_at' => 'date:Y-m-d'
     ];

     protected $fillable =[
     'name', 'start_date', 'end_date', 'category', 'status', 'agency_id', 
     ];

     public function getCreatedAtAttribute($date){
         return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
     }


     public function agency(){
          return $this->belongsTo(Agency::class);
     }
     public function donation_list(){
          return $this->hasMany(DonationList::class, 'mbd_id');
     }
     public function mbd_schedules(){
          return $this->hasMany(MBDSchedule::class, 'mbd_id');
     }
}
