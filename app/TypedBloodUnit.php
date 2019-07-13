<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypedBloodUnit extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "typed_blood_units";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'ABO', 'rh_type', 'donation_code'
     ];

     public function blood_unit(){
          return $this->belongsTo(App\BloodUnit::class);
     }
}
