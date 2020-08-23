<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class BrandController extends Controller
{
    public function index()
    {
        $brand=Brand::orderBy('id', 'DESC')->get();;
        return response()->json(['brands'=>$brand]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'Brand_name'=>'required|unique:brands',
        ]);
        $image=$request->file('image');
        if (!empty($image)){
            $imagename=$image->getClientOriginalName();
            $imagename =time().'_'.$imagename;
            $image->move(public_path('/images/brand'),$imagename);
        }else{
            $imagename=null;
        }
        $Desc=$request->Desc;
        if (!empty($Desc)){
            $content=$Desc;
        }else{
            $content=null;
        }
        $name=$request->Brand_name;
        $brand=new Brand();
        $brand->Brand_name=$name;
        $brand->description=$content;
        $brand->image=$imagename;
        if ($brand->save()){
            return response()->json(['success'=>'Success fully added']);
        }else{
            return response()->json(['warn'=>'Something wrong input properly your data']);
        }
    }

    public function distroy($id)
    {
        $delete=Brand::where("id",$id)->first();
        // delete old image
        if (File::exists(public_path('/images/brand/'.$delete->image)))
        {
            File::delete(public_path('/images/brand/'.$delete->image));
        }
        if ($delete->delete()){
            return response()->json(['success'=>'Success fully Delete']);
        }else{
            return response()->json(['warn'=>'Something wrong input properly your data']);
        }
    }
}
