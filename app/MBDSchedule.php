<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MBD;
use App\ManpowerList;
use App\MaterialList;
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

     public function mbd(){
          return $this->belongsTo(MBD::class, 'mbd_id');
     }

     public function manpower_list(){
          return $this->hasMany(ManpowerList::class, 'mbd_schedule_id');
     }

     public function donation_list(){
          return $this->hasMany(DonationList::class, 'mbd_schedule_id');
     }

     public function material_list(){
          return $this->hasMany(MaterialList::class, 'mbd_schedule_id');
     }

     public function totalSyringes(){
          $total_count = 0;
          foreach($this->material_list as $material){
               if($material->material_id == 1){
                    $total_count+=$material->quantity;
               }
          } return $total_count;
     }

     public function totalBarcodes(){
          $total_count = 0;
          foreach($this->material_list as $material){
               if($material->material_id == 2){
                    $total_count+=$material->quantity;
               }
          } return $total_count;
     }

     public function totalBloodBags(){
          $total_count = 0;
          foreach($this->material_list as $material){
               if($material->material_id == 3){
                    $total_count+=$material->quantity;
               }
          } return $total_count;
     }


     public function category(){
          switch($this->expectedDonors){

               // Category 1
               case ($this->expectedDonors > 0 && $this->expectedDonors <= 20):{
                    return "Category I";
               }
               case ($this->expectedDonors > 20 && $this->expectedDonors <= 50):{
                    return "Category II";
               }
               case ($this->expectedDonors > 50 && $this->expectedDonors <= 100):{
                    return "Category III";
               }
          
          }
     }
 
}
