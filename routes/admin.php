<?php
use Illuminate\Support\Facades\Route;
route::group(['as'=>'subadmin.','prefix'=>'subadmin','namespace'=>'Subadmin','middleware' => ['auth','admin']], function (){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
