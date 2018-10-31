<?php

namespace App\Http\Controllers\wishlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\product\ProductModel;
use App\model\wishlist\WishListModel;
use Auth;
use Session;
session_start();

class WishlistController extends Controller
{
    public function addToWishlist($id)
    {
    	$products = ProductModel::where('id',$id)->get();
        $user_email = Auth::user()->email;
    	foreach ($products as $product) {
    		$input  = [
                'user_email' => $user_email,
    			'product_name' => $product->product_name,
    			'product_image' => $product->product_image,
    			'product_price' => $product->product_price
    		];
    		WishListModel::insert($input);
    	}

    	Session::put('wishlistmessage','Product added to wishlist');
    	return redirect()->back();
    }

    public function showMyWishlist($email)
    {
        $wihsLists = WishListModel::where('user_email',$email)->get();
        return view('wishlist.wishlist')->with('wishlists',$wihsLists);
    }

    public function removeFromCompare($id)
    {
        WishListModel::where('id',$id)->delete();
        return redirect()->back();
    }
}
