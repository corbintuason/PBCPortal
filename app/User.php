<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\DonorPersonalDetails;
use App\Donation;
use App\Agency;
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function donor_personal_details(){
        return $this->hasOne(DonorPersonalDetails::class, 'donor_id');
    }

    public function donations(){
        return $this->hasMany(Donation::class, 'donor_id');
    }

    public function agencies(){
        return $this->belongsToMany(Agency::class, 'agency_user', 'donor_id');
    }

  
}
