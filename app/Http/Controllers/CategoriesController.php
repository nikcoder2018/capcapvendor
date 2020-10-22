<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
class CategoriesController extends Controller
{
    public function index(Request $request,$slug){
        $data['search'] = $request->search;
        $data['category'] = Category::where('slug',$slug)->first();

        if($request->search != null)
            $data['products'] =  Product::with(['categories','vendor','tags'])->where('title', 'like', '%'.$request->search.'%')->get();
        else
            $data['products'] =  Product::with(['categories','vendor','tags'])->get();

        #return response()->json($data); exit;
        return view('contents.categories', $data);
    }
}
