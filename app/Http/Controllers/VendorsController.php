<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Product;
use App\VendorVisit;
use App\PhoneView;
use Carbon\Carbon;
class VendorsController extends Controller
{
    public function index(Request $request){
        if($request->location){
            $location = explode(',',$request->location);
            $country = $location[0];
            $city = $location[1];
            $data['vendors'] = User::with('profile')->where('city', $city)->orWhere('country', $country)->get();
            $data['location'] = $request->location;
        }else{
            $data['vendors'] = User::with('profile')->get();
            $data['location'] = '';
        }
        
        #return response()->json($data); exit;
        
        return view('contents.restaurants', $data);
    }

    public function details(Request $request, $id){
        $data['vendor'] = User::find($id);
        $data['products'] = Product::where('vendor_id', $id)->get();

        if (Auth::check()) {
            if(Auth::user()->id != $id){
                //check if ip is already visited the link
                $visits = VendorVisit::where('ip_address', $request->ip())->where('vendor_id', $id)->orderBy('date', 'DESC')->first();
                        
                if($visits){
                    $diff = Carbon::parse(Carbon::now())->diffInDays($visits->date);
                    if($diff > 0){
                        $this->uniqVisitCounter($request->ip(),$id,$request->server('HTTP_USER_AGENT'));
                    }
                }else{
                    $this->uniqVisitCounter($request->ip(),$id,$request->server('HTTP_USER_AGENT'));
                }
            }
        }

        return view('contents.restaurants-details', $data);
    }

    public function view_phone(Request $request){
        $view = PhoneView::where('ip_address', $request->ip())->where('vendor_id', $request->vendor_id)->orderBy('date', 'DESC')->first();
                        
        if($view){
            $diff = Carbon::parse(Carbon::now())->diffInDays($view->date);
            if($diff > 0){
                $this->uniqPhoneViewCounter($request->ip(),$request->vendor_id,$request->server('HTTP_USER_AGENT'));
            }
        }else{
            $this->uniqPhoneViewCounter($request->ip(),$request->vendor_id,$request->server('HTTP_USER_AGENT'));
        }
    }
    public function uniqPhoneViewCounter($ip_address, $id, $useragent){
        $create = PhoneView::create([
            'ip_address' => $ip_address,
            'vendor_id' => $id,
            'user_agent' => $useragent,
            'date' => date('Y-m-d H:i:s')
        ]);
    }
    public function uniqVisitCounter($ip_address, $id, $useragent){
        $create = VendorVisit::create([
            'ip_address' => $ip_address,
            'vendor_id' => $id,
            'user_agent' => $useragent,
            'date' => date('Y-m-d H:i:s')
        ]);
    }
}
