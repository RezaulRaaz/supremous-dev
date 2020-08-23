<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Invetory;
use App\Model\Prdprice;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('files')){
            $picture=[];
            foreach ($request->file('files') as $key=>$file){
                $ext=$file->getClientOriginalName();
                $filename=($key+1).$request->ProductName.'.'.$ext;
                $file->move(public_path('images/products/'),$filename);
                $picture[]=$filename;
            }
            $product= new Product();
            $product->product_name=$request->ProductName;
            $product->short_description=$request->shortDsc;
            $product->description=$request->description;
            $product->youtube_link=$request->yVideoLink;
            $product->images=json_encode($picture);
            $product->stock_status=$request->stockStatus;
            $product->publish_status=$request->status;
            $product->save();
            if($product->save()){
                if (!empty($request->regularPrice || $request->specialPrice)){
                    $prdPrice= new Prdprice();
                    $prdPrice->regular_price=$request->regularPrice;;
                    $prdPrice->special_price=$request->specialPrice;
                    $prdPrice->cost_per_price=$request->costPerPiece;
                    $prdPrice->tax_per_price=$request->taxPerPiece;
                    $prdPrice->product_id=$product->id;
                    $prdPrice->save();
                }
                if(!empty($request->quantity)){
                    $inventory= new Invetory();
                    $inventory->sku=$request->Sku;;
                    $inventory->barcode=$request->barcode;
                    $inventory->available=$request->quantity;
                    $inventory->track_sell=$request->tracking;
                    $inventory->continue_selling=$request->continue;
                    $inventory->product_id=$product->id;
                    $inventory->save();
                }
            }
        }else{
            return 'dsfasdf';
        }


//        return json_encode($picture);
//        $product->name=$request->ProductName;
//        $product->save();
//        $product->shortDescription=$request->shortDsc;
//        $product->description=$request->description;
//        $product->videoLink=$request->yVideoLink;
//        $product->images=json_encode($picture);
//        $product->status=$request->status;
//        $product->Stock=$request->stockStatus;
//        $product->save();
    }
}
