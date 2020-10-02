<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    function tags(){
        return $this->hasMany(PostTag::class);
    }

    function author(){
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }
}
