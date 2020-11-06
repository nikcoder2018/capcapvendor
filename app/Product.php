<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['vendor_id', 'title', 'description', 'slug', 'regular_price', 'sale_price', 'stock_availability', 'image_url', 'delivery', 'delivery_location', 'take_away'];

    function vendor(){
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }

    function categories(){
        return $this->hasMany(ProductCategory::class)->with('category');
    }

    function tags(){
        return $this->hasMany(ProductTag::class, 'product_id', 'id');
    }
}
