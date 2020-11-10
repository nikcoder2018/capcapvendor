<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

use App\User as Vendor;
use App\Profile;
class ProfileController extends Controller
{
    public function index(){
        $data['vendor'] = Vendor::where('id', auth()->user()->id)->with(['profile'])->first();
        #return response()->json($data); exit;
        return view('contents.profile', $data);
    }

    public function update(Request $request){
        $vendor = Vendor::find($request->id);
        $location = explode(',',$request->location);
        $vendor->country = $location[0];
        $vendor->city = $location[1]; 
        $vendor->save();
        
        $profile = Profile::where('vendor_id', $request->id)->first();

        if($profile->exists()){
            if($request->hasFile('avatar')){
                if($request->file('avatar')->isValid()){
                    
                    // Get image file
                    $image = $request->file('avatar');
                   
                    // Make a image name based on user name and current timestamp
                    $name = 'profile_'.time();
                    $extension = $request->avatar->extension();
                    $upload = $request->file('avatar')->storeAs(
                        'public/profiles/vendors', 
                        $name.".".$extension,
                        'admin'
                    );
                    
                    $url = Storage::url('profiles/vendors/'.$name.".".$extension);
                    
                    $profile->avatar = $url;
                }
            }
            $profile->about = $request->about;
            $profile->phone = $request->phone;
            $profile->address = $request->address;
            $profile->save();

            if($profile)
                return array('success' => true, 'msg' => 'Profile successfully saved.');
        }else{
            $avatar = '';
            if($request->hasFile('avatar')){
                if($request->file('avatar')->isValid()){
                    // Get image file
                    $image = $request->file('avatar');
    
                    // Make a image name based on user name and current timestamp
                    $name = 'profile_'.time();
                    $extension = $request->avatar->extension();
                    $upload = $request->file('avatar')->storeAs(
                        'public/profiles/vendors', 
                        $name.".".$extension,
                        'admin'
                    );
                    $url = Storage::url('profiles/vendors/'.$name.".".$extension);
    
                    $avatar = $url;
                }
            }
            $create = Profile::create([
                'vendor_id' => auth()->user()->id,
                'avatar' => $avatar,
                'about' => $request->about,
                'phone' => $request->phone,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'location' => implode(',',array($request->latitude, $request->longitude))
            ]);

            if($create)
                return array('success' => true, 'msg' => 'Profile successfully saved.');
        }
    }
}
