<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $table = "posts_tags";

    public $timestamps = false;

    function post(){
        return $this->belongsTo(Post::class, 'id', 'post_id');
    }
}
