<?php

use App\Model\Setting;

function imgPath($imgName){
    return asset('images/'.$imgName);
}

function logo(){
    $logo= Setting::where('id',1)->first();
    return asset('images/logo/'.$logo->store_logo);
}
function favIcon(){
    $logo=Setting::find(1);
    return asset('images/logo/'.$logo->store_fav_icon);
}
function StoreName(){
    $name=Setting::find(1);
    return $name->Store_name;
}
