<?php

//client side route.............................
Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/product_by/category/{id}', 'HomeController@showProductByCategoryId')->name('product_by_category_id');
Route::get('/products/product_by/manufacturer/{id}', 'HomeController@showProductByManufacturerId')->name('product_by_manufacturer_id');
Route::get('/products/product_details/{id}', 'HomeController@showProductDetailsByIds')->name('product_details');
Route::get('/products/product_details/{id}', 'HomeController@showProductDetailsById')->name('product_details');
Route::post('products/add_to/cart/{id}','cart\CartController@addToCart')->name('addToCart');

Route::get('products/show/cart','cart\CartController@showMyCart')->name('cart');


Route::get('products/remove/cart_item/{rowId}','cart\CartController@deleteCartItem')->name('cartdelete');
Route::post('products/update/item/{rowId}','cart\CartController@updateCartItem')->name('updateCart');
Route::get('products/show/shipping-address-for-checkout','checkout\CheckoutController@checkOut')->name('checkout');
Route::post('products/shipping/','shipping\ShippingController@saveShippingInformation')->name('saveShippingAddress');
Route::get('choose/payment-system','shipping\ShippingController@choosePaymentSystem')->name('choosePaymentSystem');
Route::post('payments/method-confirm','order\OrderHandellingController@paymentmehodHandelling')->name('paymentmethodConfirm');

//wishlist route....................
Route::get('products/add-to-wishlist/{id}','wishlist\WishlistController@addToWishlist')->name('addToWishlist');
Route::get('products/wish-list/{email}','wishlist\WishlistController@showMyWishlist')->name('mywishlist');

//cmpare list rout....................
Route::get('products/add-to-compare/{id}','compare\CompareController@addToCompare')->name('addToCompare');
Route::get('products/compare-list/{email}','compare\CompareController@showMyCompareList')->name('mycomparelist');
Route::get('remove-from-compae/{id}','compare\CompareController@removeFromCompare')->name('compareRemove');














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
		//ORder show.........................................
		Route::get('show-pending-order','order\OrderHandellingController@showAllPendingOrderToAdminPanel')->name('showPendingOrder');
		Route::get('show-success-order','order\OrderHandellingController@showAllSuccessOrderToAdminPanel')->name('showCompleteOrder');
		Route::get('order-details/{customer_name}/{shippingID}','order\OrderHandellingController@showDetailsOfOrder')->name('seeOrderDetails');
		Route::get('order/success/{id}','order\OrderHandellingController@orderSuccess');
		Route::get('order/pending/{id}','order\OrderHandellingController@orderPendig');
		
});




