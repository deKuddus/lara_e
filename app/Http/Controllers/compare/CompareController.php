<?php

namespace App\Http\Controllers\compare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\compare\CompareModel;
use App\model\product\ProductModel;
use Session;
use Auth;
session_start();

class CompareController extends Controller
{
    public function addToCompare($id)
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
    		CompareModel::insert($input);
    	}

    	Session::put('compareMessage','Product added to comparelist');
    	return redirect()->back();
    }

    public function showMyCompareList($email)
    {
        $comparedList = CompareModel::where('user_email',$email)->get();
        return view('wishlist.compare')->with('comparedlists',$comparedList);
    }

    public function removeFromCompare($id)
    {
        CompareModel::where('id',$id)->delete();
        return redirect()->back();
    }
}
