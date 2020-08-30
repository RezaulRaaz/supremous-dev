<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Setting;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class SettingsController extends Controller
{
    public function store(Request $request,$id){

        $image = $request->file('logo');
        $fav= $request->file('fav_icon');
        $setting=Setting::find($id);

        if (isset($image))
        {
            $imagename = Auth::user()->name.'_'.uniqid().Auth::user()->id.'.'.$image->getClientOriginalExtension();
            //  check category dir is exists
            if (!File::exists("images/logo")) {
                File::makeDirectory("images/logo",0777,true);
            }
            // delete old image
            if (File::exists('images/logo/'.$setting->store_logo))
            {
                File::delete('images/logo/'.$setting->store_logo);
            }

            $destinationPath = 'images/logo/';
            $image->move($destinationPath, $imagename);
        }else {
            $imagename = $setting->store_logo;
        }
        if (isset($fav)){
            $favname = uniqid().Auth::user()->name.'.'.$fav->getClientOriginalExtension();
            if (!File::exists("images/logo")) {
                File::makeDirectory("images/logo",0777,true);
            }
            if (File::exists('images/logo/'.$setting->store_fav_icon))
            {
                File::delete('images/logo/'.$setting->store_fav_icon);
            }
            $destinationPath = 'images/logo/';
            $fav->move($destinationPath, $favname);
        }else{
            $favname = $setting->store_fav_icon;
        }
        $setting->Store_name=$request->Store_name;
        $setting->store_mobile=$request->Store_phone;
        $setting->store_logo=$imagename;
        $setting->store_fav_icon=$favname;
        $setting->store_alterNate_mobile=$request->alternate_phone;
        $setting->store_address=$request->address;
        $setting->store_email=$request->store_email;
        $setting->strore_description=$request->Dsc;
        $setting->save();
        return redirect()->back();

    }
}
