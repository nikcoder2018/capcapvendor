<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationCountry extends Model
{
    protected $table = "location_country";
    protected $fillable = ['region', 'name'];

    public $timestamps = false;
    
    function vendors(){
        return $this->hasMany(User::class, 'country', 'name');
    }
    function cities(){
        return $this->hasMany(LocationCity::class, 'country', 'id');
    }

    function region(){
        return $this->hasOne(LocationRegion::class, 'id', 'region');
    }
}
