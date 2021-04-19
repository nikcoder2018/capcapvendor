<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Profile as Profile;
class LocationsController extends Controller
{
    public function search(Request $request){
        
    }
    public function getLocations(Request $request){
        $search = $request->search;
        $data['locations'] = Location::where(function($q) use($search) {
            $q->orWhere('region','like', '%'.$search.'%');
            $q->orWhere('country', 'like', '%'.$search.'%');
            $q->orWhere('city', 'like', '%'.$search.'%');
        })->orderBy('region','asc')->get();

        return response()->json($data);
    }
    public function getCountry(Request $request){
        $data['countries'] = Country::with('country')->where('name', 'like','%'.$request->search.'%')->take(10)->get();

        return response()->json($data);
    }

    public function getCities(Request $request){
        if($request->country != '')
        $data['cities'] = City::with('cities')->where('country', $request->country)->where('name', 'like','%'.$request->search.'%')->take(10)->get();
        else
        $data['cities'] = City::with('cities')->where('name', 'like','%'.$request->search.'%')->take(10)->get();
        
        return response()->json($data);
    }
}
