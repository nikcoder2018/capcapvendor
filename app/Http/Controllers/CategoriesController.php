<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\ProductCategory;
class CategoriesController extends Controller
{
    public function index(Request $request,$slug){
        $category = Category::where('slug',$slug)->first();
        $data['category'] = $category;
        $data['categoryProducts'] =  ProductCategory::where('category_id',$category->id)->with('product')->get();
        #return response()->json($data); exit;
        return view('contents.categories', $data);
    }
}
