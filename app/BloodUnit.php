<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RegisteredBloodUnit;

class BloodUnit extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "blood_units";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'donation_id', 'status', 'donor_id', 'quantity'
     ];


     public function typed_blood_unit(){
          return $this->hasOne(TypedBloodUnit::class, 'blood_unit_id');
     }

     public function processed_blood_unit(){
          return $this->hasOne(ProcessedBloodUnit::class, 'blood_unit_id');
     }

     public function tested_blood_unit(){
          return $this->hasOne(TestedBloodUnit::class, 'blood_unit_id');
     }

     public function getBloodType(){
          return $this->registered_blood_unit->ABO . $this->registered_blood_unit->rh_type;
     }
}
