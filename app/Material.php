<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "materials";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'name', 'stocks_left',
     ];
 
}
