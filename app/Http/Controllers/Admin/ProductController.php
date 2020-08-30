<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Invetory;
use App\Model\Prdprice;
use App\Model\Prdrelease;
use App\Model\Prdcategory;
use App\Model\Prdbrand;
use App\Model\Prdvariant;
use App\Model\Product;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;

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
                    $prdPrice->regular_price=$request->regularPrice;
                    $prdPrice->special_price=$request->specialPrice;
                    $prdPrice->cost_per_price=$request->costPerPiece;
                    $prdPrice->tax_per_price=$request->taxPerPiece;
                    $prdPrice->supplierPrice=$request->supplierPrice;
                    $prdPrice->product_id=$product->id;
                    $prdPrice->save();
                }
                if(!empty($request->quantity)){
                    $inventory= new Invetory();
                    $inventory->sku=$request->Sku;
                    $inventory->barcode=$request->barcode;
                    $inventory->weight=$request->weight;
                    $inventory->available=$request->quantity;
                    $inventory->continue_selling=$request->continue_selling;
                    $inventory->product_id=$product->id;
                    $inventory->save();
                }
                if(!empty($request->realeaseTime)){
                    $releaseTime= new Prdrelease();
                    $releaseTime->release_date=$request->realeaseTime;
                    $releaseTime->product_id=$product->id;
                    $releaseTime->save();
                }
                if(!empty($request->categoryId)){
                    $prdCategory= new Prdcategory();
                    $prdCategory->category_id=$request->categoryId;
                    $prdCategory->subcategory_id=$request->subCategoryId;
                    $prdCategory->product_id=$product->id;
                    $prdCategory->save();
                }
                if(!empty($request->brand)){
                    $prdBrand= new Prdbrand();
                    $prdBrand->brand_id=$request->brand;
                    $prdBrand->product_id=$product->id;
                    $prdBrand->save();
                }
                if(!empty($request->selected)){
                    $PrdVariant= new Prdvariant();
                    $PrdVariant->variantion_id=$request->variationId;
                    $PrdVariant->variants_attribute=json_encode($request->selected);
                    $PrdVariant->product_id=$product->id;
                    $PrdVariant->save();
                }
             return response()->json(['success'=>'Success fully added']);
            }
        }
    }

    public function show(){

        return new ProductCollection(Product::orderBy('id','DESC')->paginate(5));
    }

    public function edit($id){
        $price=Prdprice::where('product_id',$id)->first();
        $category=Category::orderBy('id','DESC')->get();
        $inventory=Invetory::where('product_id',$id)->first();
        $release=Prdrelease::where('product_id',$id)->first();
        $product=Product::find($id);
        return view('admin/pages/Product/product_edit',compact('product','price','inventory','release','category'));
    }
}
