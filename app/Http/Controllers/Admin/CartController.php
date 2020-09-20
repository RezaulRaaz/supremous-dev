<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Model\Product;

class CartController extends Controller
{
    public function store(Request $request,$id){
        $this->validate($request,[
            'variants'=>'required',
            'qnty'=>'required',
        ]);
       $product = Product::where('id',$id)->first();
       Cart::add([
           'id'=>$product->id,
           'qty'=>$request->qnty,
           'price'=>'1235',
           'name'=>$product->product_name,
           'weight'=>550,
           'options'=>[
           'size_id'=>$request->variants
           ],
       ]);
       return redirect()->route('show.cart');
    }
}
