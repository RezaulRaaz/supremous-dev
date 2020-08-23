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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin'], function (){
    Route::get('/dashboard', 'DashboardController@Dashboard')->name('dashboard');
    Route::get('/new/item', 'DashboardController@item')->name('new.item');
    Route::get('/new/products', 'DashboardController@products')->name('new.products');
    Route::get('/new/brands', 'DashboardController@brands')->name('new.brands');
    Route::get('/new/categories', 'DashboardController@categories')->name('new.categories');

    Route::post('/add/product','ProductController@store')->name('add.product');

    Route::post('add/brand','BrandController@store')->name('add.brand');
    Route::get('get/brand','BrandController@index')->name('get.brand');
    Route::get('brand/delete/{id}','BrandController@distroy')->name('brand.delete');

    Route::post('add/category','CategoryController@store')->name('add.category');
    Route::get('get/category','CategoryController@getCategory')->name('get.category');
    Route::get('get/subCategory/{id}','CategoryController@getSubCategory')->name('get.sub.category');
    Route::get('category/delete/{id}','CategoryController@deleteCategory')->name('delete.category');
    Route::get('subcategory/delete/{id}','CategoryController@deleteSubCategory')->name('delete.sub.category');

    Route::post('add/variation','VariationController@store')->name('add.variation');
    Route::post('add/variation/attribute','VariationController@attribute')->name('add.variation.attribute');
    Route::get('get/variation','VariationController@getVariation')->name('get.variation');
    Route::get('get/sub/variation/{id}','VariationController@getSubVariation')->name('get.sub.variation');

    Route::get('/variations', 'DashboardController@variations')->name('variations');
    Route::get('/menu', 'DashboardController@menu')->name('menu');
    Route::get('/setting', 'DashboardController@setting')->name('setting');
    Route::get('/profile', 'DashboardController@profile')->name('profile');
});
