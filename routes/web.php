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

Auth::routes();

Route::get('/','FrontendController@welcome')->name('welcome');
Route::get('/products/{productName}/{id}','FrontendController@productDetails')->name('product');

Route::post('/add-to-cart/{id}','CartController@store')->name('add.cart');
Route::get('/product/cart/show','CartController@showcart')->name('show.cart');
Route::get('/product/cart/remove/{id}','CartController@remove')->name('remove.cart');





route::group(['as'=>'customar.','prefix'=>'customar','namespace'=>'Customar','middleware' => ['auth','customar']], function (){
    Route::get('/dashboard', 'CustomarController@index')->name('dashboard');
});
