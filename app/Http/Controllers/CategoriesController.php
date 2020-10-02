<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
class CategoriesController extends Controller
{
    public function index($slug){
        $data['category'] = Category::where('slug',$slug)->first();
        $data['products'] =  Product::with(['categories','vendor','tags'])->get();

        #return response()->json($data); exit;
        return view('contents.categories', $data);
    }
}
