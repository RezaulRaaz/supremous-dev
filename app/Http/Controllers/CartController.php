<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Model\Product;

class CartController extends Controller
{

    public function showcart(){
        $products =Cart::content();
        $total=0;
        foreach($products as $product){
            $total += $product->subtotal;
        }
        return view('cart',compact('products','total'));

        // return $products;
    }

    public function store(Request $request,$id){
        $this->validate($request,[
            'qnty'=>'required',
        ]);
       $product = Product::where('id',$id)->first();
       Cart::add([
           'id'=>$product->id,
           'qty'=>$request->qnty,
           'price'=>$product->prdPrice->special_price,
           'name'=>$product->product_name,
           'weight'=>550,
           "discount"=> 0,
           "taxRate"=> 0,
           'options'=>[
           'size_id'=>$request->variants,
           'image'=>json_decode($product->images)[0],
           ],
       ]);
       return redirect()->route('show.cart');
    }

    public function remove($id){
        Cart::remove($id);
        return redirect()->back();
    }
}
