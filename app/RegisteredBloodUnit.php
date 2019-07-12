<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BloodUnit;
class RegisteredBloodUnit extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "registered_blood_units";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'blood_unit_id', 'quantity'
     ];

     public function blood_unit(){
          return $this->belongsTo(BloodUnit::class);
     }
}
