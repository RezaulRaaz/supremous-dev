<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','FrontendController@welcome')->name('welcome');
Route::get('/products/{productName}/{id}','FrontendController@productDetails')->name('product');

Auth::routes();





route::group(['as'=>'customar.','prefix'=>'customar','namespace'=>'Customar','middleware' => ['auth','customar']], function (){
    Route::get('/dashboard', 'CustomarController@index')->name('dashboard');
});
