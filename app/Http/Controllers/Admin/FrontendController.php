<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slider;
use Auth;
use File;

class FrontendController extends Controller
{
    public function home(){
        $sliders = Slider::orderBy('id', 'DESC')->get();
        return view('admin/pages/frontend/Home/home',compact('sliders'));
    }

    public function show($id){
        $singleSlider = Slider::where('id', $id)->first();
        $sliders = Slider::orderBy('id', 'DESC')->get();
        return view('admin/pages/frontend/Home/editSlider',compact('sliders','singleSlider'));
    }

    public function delete($id){
        $delete=Slider::where("id",$id)->first();
        // delete old image
        if (File::exists(public_path('/images/slider/'.$delete->image)))
        {
            File::delete(public_path('/images/slider/'.$delete->image));
        }
        return redirect()->back();
    }
    public function update(Request $request,$id){
        $slider= Slider::find($id);
        $image=$request->file('image');
        if (isset($image)){
            $imagename = uniqid().Auth::user()->name.'.'.$image->getClientOriginalExtension();
            if (!File::exists("images/slider")) {
                File::makeDirectory("images/slider",0777,true);
            }
            if (File::exists('images/slider/'.$slider->image))
            {
                File::delete('images/slider/'.$slider->image);
            }
            $destinationPath = 'images/slider/';
            $image->move($destinationPath, $imagename);
        }else{
            $imagename = $slider->image;
        }
        $slider->title=$request->Slider_title;
        $slider->text_color=$request->text_color;
        $slider->button_label=$request->button_label;
        $slider->bg_color=$request->bg_color;
        $slider->btn_color=$request->btn_text_color;
        $slider->btn_url=$request->btn_url;
        $slider->image=$imagename;
        $slider->save();
        return redirect()->back();
    }

    public function sliderStore(Request $request){
        $image=$request->file('image');
        if (isset($image)){
            $imagename = uniqid().Auth::user()->name.'.'.$image->getClientOriginalExtension();
            if (!File::exists("images/slider")) {
                File::makeDirectory("images/slider",0777,true);
            }
            $destinationPath = 'images/slider/';
            $image->move($destinationPath, $imagename);

            $slider = new Slider();
            $slider->title=$request->Slider_title;
            $slider->text_color=$request->text_color;
            $slider->button_label=$request->button_label;
            $slider->bg_color=$request->bg_color;
            $slider->btn_color=$request->btn_text_color;
            $slider->btn_url=$request->btn_url;
            $slider->image=$imagename;
            $slider->save();
            return redirect()->back();
        }
    }
}
