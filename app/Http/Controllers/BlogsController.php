<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class BlogsController extends Controller
{
    public function index(){
        $data['blogs'] = Post::paginate(5);

        #return response()->json($data); exit;
        return view('contents.blogs', $data);
    }

    public function details($slug){
        $data['blog'] = Post::with(['tags', 'author'])->where('slug', $slug)->first();
        #return response()->json($data); exit;
        return view('contents.blogs-details', $data);
    }
}
