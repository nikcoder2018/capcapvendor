<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\ProductCategory;
use App\ProductTag;
use App\Tag;
use App\User as Vendor;
class CategoriesController extends Controller
{
    public function index(Request $request,$slug){
        $category = Category::where('slug',$slug)->first();
        $location = explode(',',$request->location);
        $country = @$location[0];
        $city = @$location[1];
        $type = $request->type;
        $keyword = $request->keyword;
        $tags = $request->tags != null ? explode(',',$request->tags) : array();

        $productsArray = array();
        $productsCategory = ProductCategory::where('category_id',$category->id)->get();
        
        if($country != null || $city != null){
            $vendorsArray = array();
            $vendors = Vendor::where('country',$country)->orWhere('city', $city)->get();
            foreach($vendors as $vendor){
                array_push($vendorsArray, $vendor->id);
            }
        }
        foreach($productsCategory as $proCat){
            $product = array();
            switch($type){
                case 'delivery':
                    if(isset($vendorsArray)){
                        $product = Product::with('vendor')->where('id', $proCat->product_id)->whereIn('vendor_id', $vendorsArray)->orWhere('title', 'like',$keyword.'%')->where('delivery', 1)->first();
                    }else{
                        $product = Product::with('vendor')->where('id', $proCat->product_id)->orWhere('title', 'like',$keyword.'%')->where('delivery', 1)->first();
                    }
                break;
                case 'take_away':
                    if(isset($vendorsArray)){
                        $product = Product::with('vendor')->where('id', $proCat->product_id)->whereIn('vendor_id', $vendorsArray)->orWhere('title', 'like',$keyword.'%')->where('take_away', 1)->first();
                    }else{
                        $product = Product::with('vendor')->where('id', $proCat->product_id)->orWhere('title', 'like',$keyword.'%')->where('take_away', 1)->first();
                    }
                    
                break;
                default: 
                    if(isset($vendorsArray)){
                        $product = Product::with('vendor')->where('id', $proCat->product_id)->whereIn('vendor_id', $vendorsArray)->orWhere('title', 'like',$keyword.'%')->first();
                    }else{
                        $product = Product::with('vendor')->where('id', $proCat->product_id)->orWhere('title', 'like',$keyword.'%')->first();
                    }
            }

            if(count($tags) > 0){
                $tagCount = 0;
                foreach($tags as $tag){
                    if(ProductTag::where('tag', $tag)->where('product_id', $product->id)->exists()){
                        $tagCount++;
                    }
                }
                if($tagCount > 0 && $product != null){
                    array_push($productsArray, $product);
                }
            }elseif($product != null){
                array_push($productsArray, $product);
            }
        }
        $data['tags'] = Tag::all();
        $data['category'] = $category;
        $data['categoryProducts'] = $productsArray;
        return view('contents.categories', $data);
    }
}
