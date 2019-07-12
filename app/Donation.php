<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Donor;

class Donation extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "donations";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'donor_id', 'status'
     ];

     public function donor(){
          return $this->belongsTo(User::class, 'donor_id');
     }
}
