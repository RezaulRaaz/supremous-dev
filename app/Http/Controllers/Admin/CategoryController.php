<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'Category_name'=>'required|unique:categories',
            'Category_name'=>'unique:subcategories',
        ]);

       $slug = Str::slug($request->Category_name, '-');

       if ($request->category=="select" || empty($request->category)){
           $image=$request->file('image');
           if (!empty($image)){
               $imagename=$image->getClientOriginalName();
               $imagename =time().'_'.$imagename;
               $image->move(public_path('/images/category'),$imagename);
           }else{
               $imagename=null;
           }
           $cat=new Category();
           $cat->slug=$slug;
           $cat->Category_name=$request->Category_name;
           $cat->Image=$imagename;
           $cat->Dsc=$request->Dsc;
           if ($cat->save()){
               return response()->json(['success'=>'Success fully added']);
           }else{
               return response()->json(['warn'=>'Something wrong input properly your data']);
           }
       }else{
           $image=$request->file('image');
           if (!empty($image)){
               $imagename=$image->getClientOriginalName();
               $imagename =time().'_'.$imagename;
               $image->move(public_path('/images/category/'),$imagename);
           }else{
               $imagename=null;
           }
           $cat=new Subcategory();
           $cat->Category_name=$request->Category_name;
           $cat->Dsc=$request->Dsc;
           $cat->slug=$slug;
           $cat->Image=$imagename;
           $cat->category_id=$request->category;
           if ($cat->save()){
               return response()->json(['success'=>'Success fully added']);
           }else{
               return response()->json(['warn'=>'Something wrong input properly your data']);
           }
       }

    }

    public function getCategory()
    {
        $category=Category::with('subcategories')->orderBy('id','DESC')->get();
        $sub=Subcategory::with('category')->get();
        return response()->json(['category'=>$category,'sub'=>$sub]);
    }
    public function getSubCategory($id){
        $sub=Subcategory::where('category_id',$id)->orderBy('id','DESC')->get();
        return response()->json(['sub'=>$sub]);
    }

    public function deleteCategory($id)
    {
        $delete=Category::where("id",$id)->first();
        // delete old image
        if (File::exists(public_path('/images/category/'.$delete->Image)))
        {
            File::delete(public_path('/images/category/'.$delete->Image));
        }
        if ($delete->delete()){
            return response()->json(['success'=>'Success fully Delete']);
        }else{
            return response()->json(['warn'=>'Something wrong input properly your data']);
        }
    }

    public function deleteSubCategory($id)
    {
        $delete=Subcategory::where("id",$id)->first();
        // delete old image
        if (File::exists(public_path('/images/category/'.$delete->Image)))
        {
            File::delete(public_path('/images/category/'.$delete->Image));
        }
        if ($delete->delete()){
            return response()->json(['success'=>'Success fully Delete']);
        }else{
            return response()->json(['warn'=>'Something wrong input properly your data']);
        }
    }
}
