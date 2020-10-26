<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Product;
class VendorsController extends Controller
{
    public function index(Request $request){
        $location = explode(',',$request->location);
        $country = $location[0];
        $city = $location[1];
        
        $data['location'] = $request->location;
        $data['vendors'] = User::with('profile')->where('city', $city)->orWhere('country', $country)->get();
        
        #return response()->json($data); exit;
        
        return view('contents.restaurants', $data);
    }

    public function details($id){
        $data['vendor'] = User::find($id);
        $data['products'] = Product::where('vendor_id', $id)->get();
        return view('contents.restaurants-details', $data);
    }
}
