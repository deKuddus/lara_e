<?php

namespace App\Http\Controllers\shipping;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\shipping\ShippingModel;
use Session;
session_start();

class ShippingController extends Controller
{
    public function saveShippingInformation(Request $request)
    {
    	$request->validate([

    		'lastName' => 'required|string',
    		'firstName' => 'required|string',
    		'email' => 'required|email|unique:tbl_shipping,customer_email',
    		'mobile' => 'required|string|min:11|max:11',
    		'address1' => 'required|string',
    		'address2' => 'string',
    		'city' => 'required|string',
    	]);

    	$input = [
    		'customer_fname' => $request->firstName,
    		'customer_lname' => $request->lastName,
    		'customer_email' => $request->email,
    		'customer_phone' => $request->mobile,
    		'customer_address1' => $request->address1,
    		'customer_address2' => $request->address2,
    		'customer_city' => $request->city
    	];



    	$shipping_id = ShippingModel::create($input);
        Session::put('shipping_id',$shipping_id->id);
    	return redirect(route('choosePaymentSystem'));
    }


    public function choosePaymentSystem()
    {
        return view('payment.payment');
    }
}
