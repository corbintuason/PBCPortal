<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestedBloodUnit extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "tested_blood_units";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'blood_unit_id', 'hbSag', 'HCV', 'HIV', 'malaria', 'syphilis'
     ];
}
