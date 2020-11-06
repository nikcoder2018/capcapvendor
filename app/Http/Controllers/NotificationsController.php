<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class NotificationsController extends Controller
{
    public function index(){
        return view('contents.notifications');
    }

    public function allow_newsletter(Request $request){
        $user = User::find(auth()->user()->id);
        $user->allow_newsletters = $request->status;
        $user->save();
    }   
}
