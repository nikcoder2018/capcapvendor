<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'vendors';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','vendor_name', 'email', 'password', 'vat', 'vat_sec', 'city', 'country'
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

    function profile(){
        return $this->hasOne(Profile::class, 'vendor_id', 'id');
    }

    function countryInfo(){
        return $this->hasOne(LocationCountry::class, 'id', 'country');
    }

    function cityInfo(){
        return $this->hasOne(LocationCity::class, 'id', 'city');
    }
}
