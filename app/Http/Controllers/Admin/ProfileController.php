<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use File;

class ProfileController extends Controller
{
    public function store(Request $request){

        $profile= User::find(Auth::User()->id);
        $image=$request->file('avatar');
        if (isset($image)){
            $imagename = uniqid().Auth::user()->name.'.'.$image->getClientOriginalExtension();
            if (!File::exists("images/profile")) {
                File::makeDirectory("images/profile",0777,true);
            }
            if (File::exists('images/profile/'.$profile->avatar))
            {
                File::delete('images/profile/'.$profile->avatar);
            }
            $destinationPath = 'images/profile/';
            $image->move($destinationPath, $imagename);
        }else{
            $imagename = $profile->avatar;
        }
        $profile->avatar=$imagename;
        $profile->save();
        return redirect()->back();

    }
}
