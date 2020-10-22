<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "vendors_profile";
    protected $fillable = ['vendor_id', 'avatar', 'location', 'delivery', 'about', 'facebook', 'instagram', 'twitter', 'website'];

    public $timestamps = false;
}
