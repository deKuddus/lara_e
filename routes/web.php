<?php

//client side route.............................
Route::get('/', 'HomeController@index');


















//server side route.....................................


Route::prefix('admin')->group(function(){
		Route::get('/logout','Admin\SuperAdminController@logout');
		Route::get('/login','Admin\AdminController@login');
		Route::post('/login','Admin\AdminController@login_complete')->name('admin.login');

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
});

