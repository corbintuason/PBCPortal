<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessedBloodUnit extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "processed_blood_units";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'blood_unit_id', 'whole_blood', 'packed_rbc', 'platelet_concentrate',
     'ffp', 'cryoprecipitate', 'cryosupernate'
     ];
}
