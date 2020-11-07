<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\PhoneView;
use App\ProductVisit;

use Carbon\Carbon;
class UserPanelController extends Controller
{
    public function index(){
        $data['totalProducts'] = Product::where('vendor_id', auth()->user()->id)->count();
        $data['totalPhoneViews'] = PhoneView::where('vendor_id', auth()->user()->id)->where('date', '>=', Carbon::now()->subDays(30))->count();
        $data['totalProductVisits'] = ProductVisit::where('vendor_id', auth()->user()->id)->where('date', '>=', Carbon::now()->subDays(30))->count();
        return view('contents.userpanel', $data);
    }
}
