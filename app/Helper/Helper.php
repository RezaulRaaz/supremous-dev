<?php

use App\Model\Setting;
use App\Model\Social;
use App\Model\Info;

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

function Store(){
    $store=Setting::find(1);
    return $store;
}
function currency(){
    $info=Info::find(1);
    return $info->currency;
}
function social(){
    $Social=Social::find(1);
    return $Social;
}
