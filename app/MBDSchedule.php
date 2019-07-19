<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MBDSchedule extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "mbd_schedules";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'mbd_id', 'start_time', 'end_time', 'venue', 'expectedDonors', 'date'
     ];
 
}
