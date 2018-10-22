<?php

//client side route.............................
Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/product_by/category/{id}', 'HomeController@showProductByCategoryId')->name('product_by_category_id');
Route::get('/products/product_by/manufacturer/{id}', 'HomeController@showProductByManufacturerId')->name('product_by_manufacturer_id');
Route::get('/products/product_details/{id}', 'HomeController@showProductDetailsByIds')->name('product_details');
Route::get('/products/product_details/{id}', 'HomeController@showProductDetailsById')->name('product_details');
















//server side route.....................................


Route::prefix('admin')->group(function(){

		Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'Admin\Auth\LoginController@login');
		Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

		Route::get('/dashboard','Admin\AdminController@index');
		//category route....................
		Route::resource('/category','category\CategoryController');

		Route::get('/category/active/{catId}','category\CategoryController@activeCategory');
		Route::get('/category/deactive/{catId}','category\CategoryController@deactiveCategory');
		//manufacturer route.........
		Route::resource('/manufacturer','manufacturer\manufacturerController');
		Route::get('/manufacturer/active/{catId}','manufacturer\manufacturerController@activeManufacturer');
		Route::get('/manufacturer/deactive/{catId}','manufacturer\manufacturerController@deactiveManufacturer');

		//product route.......................................
		Route::resource('/product','product\ProductController');
		Route::get('product/active/{id}','product\ProductController@activeProduct');
		Route::get('product/deactive/{id}','product\ProductController@deactiveProduct');

		//slider Route................................................
		Route::resource('/slider','slider\SliderController');
		Route::get('slider/active/{id}','slider\SliderController@activeSlider');
		Route::get('slider/deactive/{id}','slider\SliderController@deactiveSlider');
});




