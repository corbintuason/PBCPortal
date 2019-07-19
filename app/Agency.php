<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MBD;
use App\User;
class Agency extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "agencies";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'name', 'email', 'address'
     ];

     public function mbds(){
          return $this->hasMany(MBD::class);
     }

     public function donors(){
          return $this->hasMany(User::class, 'donor_id');
     }
}
