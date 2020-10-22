<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Product;
class VendorsController extends Controller
{
    public function index(Request $request){
        $data['search'] = $request->search;
        if($request->search != null)
            $data['vendors'] = User::where('vendor_name','like','%'.$request->search.'%')->get();
        else 
            $data['vendors'] = User::all();
        
        return view('contents.restaurants', $data);
    }

    public function details($id){
        $data['vendor'] = User::find($id);
        $data['products'] = Product::where('vendor_id', $id)->get();
        return view('contents.restaurants-details', $data);
    }
}
