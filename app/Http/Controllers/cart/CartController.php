<?php

namespace App\Http\Controllers\cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\product\ProductModel;
use App\model\category\CatModel;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
    	$quantity  = $request->quantity;
    	$getProduct = ProductModel::where('id',$id)->first();
    	
    	$product_info  = [
    		'id' => $id, 
    		'name' => $getProduct->product_name, 
    		'qty' => $quantity, 
    		'price' => $getProduct->product_price, 
    		'options' => ['image' => $getProduct->product_image]
    	];
/*    	$data['id'] = $id;
    	$data['name'] =$getProduct->product_name;
    	$data['qty'] =$quantity;
    	$data['price'] =$getProduct->product_price;
    	$data['options']['image'] =$getProduct->product_image;*/


    	Cart::add($product_info);
    	return redirect(route('cart'));
    	
    }

    public function showMyCart()
    {
    	$all_category = CatModel::where('category_status',1)->get();
    	return view('cart.addToCart')->with('categories',$all_category); 
    }

    public function deleteCartItem($rowId)
    {
    	Cart::remove($rowId);
    	return redirect(route('cart'));
    }


    public function updateCartItem(Request $request ,$rowId)
    {
    	$newValue = $request->qty;
    	Cart::update($rowId,$newValue);
    	return redirect(route('showCart'));

    }




}
