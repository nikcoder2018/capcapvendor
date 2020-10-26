<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\LocationCity as City;

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
        $data['locations'] = City::with('country')->get();
        return view('contents.home', $data);
    }
}
