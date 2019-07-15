<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Donation;

class DonationDonorHistory extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "donation_donor_histories";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'donation_id', 'answer_1', 'answer_2', 'answer_3',
     'answer_4', 'answer_5', 'answer_6',
     'answer_7', 'answer_8', 'answer_9',
     'answer_10', 'answer_11', 'answer_12',
     'answer_13', 'answer_14', 'answer_15',
     'answer_16', 'answer_17', 'answer_18',
     'answer_19', 'answer_20', 'answer_21',
     'answer_22', 'answer_23', 'answer_24',
     'answer_25', 'answer_26', 'verdict', 'remarks'
     ];

     public function donation(){
         return $this->belongsTo(Donation::class);
     }
}
