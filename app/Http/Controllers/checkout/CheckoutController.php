<?php

namespace App\Http\Controllers\checkout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Cart;
use Session;
session_start();


class CheckoutController extends Controller
{



    public function checkOut ()
    {
    	if(Auth::user()){
    		$shipping_id = Session::get('shipping_id');

    		if($shipping_id != false)
    		{
    			return view('payment.payment');
    		}
    		elseif($shipping_id != true)
    		{
                $cart = Cart::content();
                if(empty($cart)){
                    return redirect(route('home'));
                }else{

    			    return view('cart.checkout');
                }

    		}
    	}
    	else{
    		return redirect(route('login'));
    	}
    }
}
