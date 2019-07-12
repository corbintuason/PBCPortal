<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class DonorPersonalDetails extends Model
{
    // Primary Key 
    public $primaryKey = "id";
    // Event Name
    protected $table = "donor_personal_details";
    // Primary Key 
    public $timestamps = true;
    
    protected $fillable = [
    'sex','civil_status','contact_number','occupation','nationality'
    ];

    public function donor(){
        return $this->belongsTo(User::class, 'donor_id');
    }
}
