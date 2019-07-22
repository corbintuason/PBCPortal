<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Admin;
use App\MBDSchedule;

class ManpowerList extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "manpower_lists";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'admin_id', 'mbd_schedule_id',
     ];
 
     public function mbd_schedule(){
         return $this->belongsTo(MBDSchedule::class);
     }

     public function admin(){
         return $this->belongsTo(Admin::class);
     }


}
