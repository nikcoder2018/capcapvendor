<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LocationCity as City;
use App\Profile as Profile;
class LocationsController extends Controller
{
    public function search(Request $request){
        
    }
    public function getLocations(Request $request){
        $data['locations'] = City::with('country')->where('name', 'like','%'.$request->search.'%')->take(10)->get();

        return response()->json($data);
    }
}
