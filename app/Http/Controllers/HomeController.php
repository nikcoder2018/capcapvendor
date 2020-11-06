<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\LocationCity as City;
use App\LocationCountry as Country;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['posts'] = Post::orderBy('created_at', 'desc')->take(3)->get();
        #$data['locations'] = City::with('country')->get();
        $locations = Country::with('vendors')->get();
        $locations = reset($locations);

        $sort = array();
        foreach ($locations as $key => $row) {
            $sort[$key]  = $row['vendors'];
        }
        
        array_multisort($sort, SORT_DESC, $locations);
        $data['locations'] = array_chunk($locations, 7);

        return view('contents.home', $data);
    }
}
