<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = "products_category";
    protected $fillable = ['product_id', 'category_id'];

    public $timestamps = false;

    function product(){
        return $this->hasOne(Product::class, 'id', 'product_id')->with('vendor');
    }
    function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
