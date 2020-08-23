<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Subvariation;
use App\Model\Variation;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:variations',
        ]);

        $unit=new Variation();
        $unit->name=$request->name;
        $unit->save();
        if ($unit->save()){
            return response()->json(['success'=>'Success fully added']);
        }else{
            return response()->json(['warn'=>'Something wrong input properly your data']);
        }
    }

    public function getVariation()
    {
        $variation=Variation::orderBy('id','DESC')->get();
        return response()->json(['variationData'=>$variation]);
    }

    public function attribute(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:subvariations',
        ]);
        $svariation=new Subvariation();
        $svariation->name=$request->name;
        $svariation->variation_id=$request->variation_id;
        $svariation->save();
        if ($svariation->save()){
            return response()->json(['success'=>'Success fully added']);
        }else{
            return response()->json(['warn'=>'Something wrong input properly your data']);
        }
    }

    public function getSubVariation($id)
    {
        $subvarietion=Subvariation::where('variation_id',$id)->get();
        return response()->json(['attributeResult'=>$subvarietion]);
    }
}
