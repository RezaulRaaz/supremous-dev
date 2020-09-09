<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class FrontendController extends Controller
{
    public function welcome(){
        $products=Product::orderBy('id','DESC')->where('publish_status','=','true')->limit(15)->get();
        return view('welcome',compact('products'));
    }
    public function productDetails($productName,$id){
        $prd=Product::where('id','=',$id)->first();
        return view('single',compact('prd'));
    }
}
