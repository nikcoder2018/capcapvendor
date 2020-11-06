<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function faq(){
        return view('contents.faq');
    }
    public function pricing(){
        return view('contents.pricing');
    }
}
