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
use App\Model\Subcategory;
use App\Model\Prdposition;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;
use Illuminate\Support\Str;

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
            $slug = Str::slug($request->ProductName, '-');
            $product= new Product();
            $product->product_name=$request->ProductName;
            $product->short_description=$request->shortDsc;
            $product->description=$request->description;
            $product->youtube_link=$request->yVideoLink;
            $product->images=json_encode($picture);
            $product->stock_status=$request->stockStatus;
            $product->slug=$slug;
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
                $prdposition= new Prdposition();
                $prdposition->position=$request->positionSelect;
                $prdposition->product_id=$product->id;
                $prdposition->save();
             return response()->json(['success'=>'Success fully added']);
            }
        }else{
            $slug = Str::slug($request->ProductName, '-');
            $product= new Product();
            $product->product_name=$request->ProductName;
            $product->short_description=$request->shortDsc;
            $product->description=$request->description;
            $product->youtube_link=$request->yVideoLink;
            $product->stock_status=$request->stockStatus;
            $product->slug=$slug;
            $product->publish_status=$request->status;
            $product->save();
            if($product->save()){
                    $prdPrice= new Prdprice();
                    $prdPrice->regular_price=$request->regularPrice;
                    $prdPrice->special_price=$request->specialPrice;
                    $prdPrice->cost_per_price=$request->costPerPiece;
                    $prdPrice->tax_per_price=$request->taxPerPiece;
                    $prdPrice->supplierPrice=$request->supplierPrice;
                    $prdPrice->product_id=$product->id;
                    $prdPrice->save();

                    $inventory= new Invetory();
                    $inventory->sku=$request->Sku;
                    $inventory->barcode=$request->barcode;
                    $inventory->weight=$request->weight;
                    $inventory->available=$request->quantity;
                    $inventory->continue_selling=$request->continue_selling;
                    $inventory->product_id=$product->id;
                    $inventory->save();

                    $releaseTime= new Prdrelease();
                    $releaseTime->release_date=$request->realeaseTime;
                    $releaseTime->product_id=$product->id;
                    $releaseTime->save();

                    $prdCategory= new Prdcategory();
                    $prdCategory->category_id=$request->categoryId;
                    $prdCategory->subcategory_id=$request->subCategoryId;
                    $prdCategory->product_id=$product->id;
                    $prdCategory->save();

                    $prdBrand= new Prdbrand();
                    $prdBrand->brand_id=$request->brand;
                    $prdBrand->product_id=$product->id;
                    $prdBrand->save();

                    $PrdVariant= new Prdvariant();
                    $PrdVariant->variantion_id=$request->variationId;
                    $PrdVariant->variants_attribute=json_encode($request->selected);
                    $PrdVariant->product_id=$product->id;
                    $PrdVariant->save();

                    $prdposition= new Prdposition();
                    $prdposition->position=$request->positionSelect;
                    $prdposition->product_id=$product->id;
                    $prdposition->save();

             return response()->json(['success'=>'Success fully added']);
            }
        }
    }

    public function show(){

        return new ProductCollection(Product::orderBy('id','DESC')->paginate(20));
    }

    public function edit($id){

        $category=Category::orderBy('id','DESC')->get();
        $subcategory=Subcategory::orderBy('id','DESC')->get();
        $inventory=Invetory::where('product_id',$id)->first();
        $prdCategory=Prdcategory::where('product_id',$id)->first();
        $release=Prdrelease::where('product_id',$id)->first();
        $prdbrand=Prdbrand::where('product_id',$id)->first();
        $prdvairiants=Prdvariant::where('product_id',$id)->first();
        $product=Product::find($id);
        return view('admin/pages/Product/product_edit',compact('product','inventory','release','category','prdCategory','subcategory','prdbrand','prdvairiants'));
    }
    public function UpdateProduct(Request $request){

        $date = date("FY");
        $id=$request->id;
        if ($request->hasFile('files')){
            $product= Product::find($request->id);
            $picture=[];
            foreach ($request->file('files') as $key=>$file){
                $ext=$file->getClientOriginalName();
                $filename=$date.'/'.($key+1).$request->ProductName.'.'.$ext;
                $file->move(public_path('images/products/'.$date.'/'),$filename);
                $picture[]=$filename;
            }
            $product->product_name=$request->ProductName;
            $product->short_description=$request->shortDsc;
            $product->description=$request->description;
            $product->youtube_link=$request->yVideoLink;
            $product->images=json_encode($picture);
            $product->stock_status=$request->stockStatus;
            $product->publish_status=$request->status;
            $product->save();
            $prdPrice= Prdprice::where('product_id',$id)->first();
            $prdPrice->regular_price=$request->regularPrice;
            $prdPrice->special_price=$request->specialPrice;
            $prdPrice->cost_per_price=$request->costPerPiece;
            $prdPrice->tax_per_price=$request->taxPerPiece;
            $prdPrice->supplierPrice=$request->supplierPrice;
            $prdPrice->save();

            $inventory= Invetory::where('product_id',$id)->first();
            $inventory->sku=$request->Sku;
            $inventory->barcode=$request->barcode;
            $inventory->weight=$request->weight;
            $inventory->available=$request->quantity;
            $inventory->continue_selling=$request->continue_selling;
            $inventory->save();

            $releaseTime= Prdrelease::where('product_id',$id)->first();
            $releaseTime->release_date=$request->realeaseTime;
            $releaseTime->save();

            $prdCategory= Prdcategory::where('product_id',$id)->first();
            $prdCategory->category_id=$request->categoryId;
            $prdCategory->subcategory_id=$request->subCategoryId;
            $prdCategory->save();

            $prdBrand=Prdbrand::where('product_id',$id)->first();
            $prdBrand->brand_id=$request->brand;
            $prdBrand->save();

            $PrdVariant= Prdvariant::where('product_id',$id)->first();
            $PrdVariant->variantion_id=$request->variationId;
            $PrdVariant->variants_attribute=json_encode($request->selected);
            $PrdVariant->save();

            $prdposition= Prdposition::where('product_id',$id)->first();
            $prdposition->position=$request->positionSelect;
            $prdposition->product_id=$product->id;
            $prdposition->save();
            return response()->json(['success'=>'Success fully Updated']);
        }else{
            $product= Product::find($id);
            $product->product_name=$request->ProductName;
            $product->short_description=$request->shortDsc;
            $product->description=$request->description;
            $product->youtube_link=$request->yVideoLink;
            $product->images= $product->images;
            $product->stock_status=$request->stockStatus;
            $product->publish_status=$request->status;
            $product->save();

            $prdPrice= Prdprice::where('product_id',$id)->first();
            $prdPrice->regular_price=$request->regularPrice;
            $prdPrice->special_price=$request->specialPrice;
            $prdPrice->cost_per_price=$request->costPerPiece;
            $prdPrice->tax_per_price=$request->taxPerPiece;
            $prdPrice->supplierPrice=$request->supplierPrice;
            $prdPrice->save();

            $inventory= Invetory::where('product_id',$id)->first();
            $inventory->sku=$request->Sku;
            $inventory->barcode=$request->barcode;
            $inventory->weight=$request->weight;
            $inventory->available=$request->quantity;
            $inventory->continue_selling=$request->continue_selling;
            $inventory->save();

            $releaseTime= Prdrelease::where('product_id',$id)->first();
            $releaseTime->release_date=$request->realeaseTime;
            $releaseTime->save();

            $prdCategory= Prdcategory::where('product_id',$id)->first();
            $prdCategory->category_id=$request->categoryId;
            $prdCategory->subcategory_id=$request->subCategoryId;
            $prdCategory->save();

            $prdBrand=Prdbrand::where('product_id',$id)->first();
            $prdBrand->brand_id=$request->brand;
            $prdBrand->save();

            $PrdVariant= Prdvariant::where('product_id',$id)->first();
            $PrdVariant->variantion_id=$request->variationId;
            $PrdVariant->variants_attribute=json_encode($request->selected);
            $PrdVariant->save();

            $prdposition= Prdposition::where('product_id',$id)->first();
            $prdposition->position=$request->positionSelect;
            $prdposition->product_id=$product->id;
            $prdposition->save();

            return response()->json(['success'=>'Success fully Updated']);
        }
    }
    public function EditProduct($id){
        $price=Prdprice::where('product_id',$id)->first();
        return response()->json(['price'=>$price]);
    }
}
