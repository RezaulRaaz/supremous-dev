<?php
use Illuminate\Support\Facades\Route;

route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware' => ['auth','superadmin']], function (){
    Route::get('/dashboard', 'DashboardController@Dashboard')->name('dashboard');
    Route::get('/new/item', 'DashboardController@item')->name('new.item');
    Route::get('/new/products', 'DashboardController@products')->name('new.products');
    Route::get('/new/brands', 'DashboardController@brands')->name('new.brands');
    Route::get('/new/categories', 'DashboardController@categories')->name('new.categories');

    Route::post('/add/product','ProductController@store')->name('add.product');
    Route::get('/get/products','ProductController@show')->name('get.product');
    Route::get('/edit/product/{id}','ProductController@edit')->name('edit.product');
    Route::post('/update/product','ProductController@UpdateProduct')->name('update.product');

    Route::get('/get/edit/products/{id}','ProductController@EditProduct')->name('get.edit.price');


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
    Route::post('/add/setting/{id}', 'SettingsController@store')->name('add.setting');
    Route::post('/add/info', 'SettingsController@info')->name('add.info');
    Route::get('/get/info', 'SettingsController@getinfo')->name('get.info');
    Route::get('/settings/social','SettingsController@Social' )->name('settings.social');
    Route::post('/settings/change/password','SettingsController@Changepassword')->name('settings.change.password');

    Route::post('/settings/social/add','SettingsController@addStore' )->name('add.social');



    Route::get('/profile', 'DashboardController@profile')->name('profile');
    Route::post('/profile/add', 'ProfileController@store')->name('add.profile');

});
