<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use Hashids;
use DB;
use App\Model\Slider;

class FrontendController extends Controller
{
    public function welcome(){
        $products= DB::table('products')
        ->join('prdpositions', 'prdpositions.product_id', '=', 'products.id')
        ->join('prdprices', 'prdprices.product_id', '=', 'products.id')
        ->select('products.*', 'prdpositions.*','prdprices.*')
        ->where('products.publish_status','=','true')
        ->where('prdpositions.position','=','Fetured')
        ->orderBy('products.id','DESC')
        ->limit(10)
        ->get();
        $prdNewest= DB::table('products')
        ->join('prdpositions', 'prdpositions.product_id', '=', 'products.id')
        ->join('prdprices', 'prdprices.product_id', '=', 'products.id')
        ->select('products.*', 'prdpositions.*','prdprices.*')
        ->where('products.publish_status','=','true')
        ->where('prdpositions.position','=','Newest')
        ->orderBy('products.id','DESC')
        ->limit(10)
        ->get();
        $sliders=Slider::orderBy('id','Desc')->get();
        return view('welcome',compact('products','prdNewest','sliders'));
    }
    public function productDetails($productName,$id){
        $pid = Hashids::decode($id);
        $prd=Product::where('id','=',$pid)->first();
        return view('single',compact('prd'));
    }
}
