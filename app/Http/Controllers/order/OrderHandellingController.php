<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use App\model\order\OrderDetailsModel;
use App\model\order\OrderHandellingModel;
use App\model\payment\PaymentHandelModel;
use App\model\shipping\ShippingModel;
use Cart;
use Auth;
use Illuminate\Http\Request;
use Session;
session_start();

class OrderHandellingController extends Controller
{
    public function paymentmehodHandelling(Request $request)
    {
    	/// INSERT DATA INTO PAYMENT TABLE
    	$request->validate([
    		'paymentMethod' => 'required'
    	]);
    	$payment_method = $request->paymentMethod;
    	$cart = Cart::content();

    	if($payment_method == "handcash" && $cart != ""){ 

	    	
	    	$payment = PaymentHandelModel::create(['payment_method' => $payment_method]);
	    	$payment_id = $payment->id;

	    	$customer_email = Auth::user()->email;
	    	$shipping_id = Session::get('shipping_id');
	    	$total_balance = Cart::total();

	    	///INSERT DATA INTO ORDER TABLE
	    	$order_input = [

	    		'payment_id' => $payment_id,
	    		'shipping_id' => $shipping_id,
	    		'customer_email' => $customer_email,
	    		'total_order' => $total_balance,
	    	];

	    	$order = OrderHandellingModel::create($order_input);
	    	$order_id = $order->id;
	    	Session::put('order_id',$order_id);


	    	///INSERT DATA INTO ORDER DETAILS TABLE
	    	$contents = Cart::content();
	    	foreach ($contents as $content) {
	    		$input = [
	    			'order_id' => $order_id,
	    			'product_id' => $content->id,
	    			'product_name' => $content->name,
	    			'product_price' => $content->price,
	    			'product_quantity' => $content->qty,
	    			'customer_email' => $customer_email
	    	];
	    		OrderDetailsModel::create($input);
	    	}
	    	Cart::destroy();
	    	return redirect(route('home'));
	    }else{
	    	Session::put('paymentmessage','Service not abailable, you can pay only hand cash');
	    	return redirect(route('choosePaymentSystem'));
	    }


    }


    public function showAllPendingOrderToAdminPanel()
    {
    	$all_order = OrderHandellingModel::get();
    	return view('order.showOrder')->with('orders',$all_order);
    }

    public function showDetailsOfOrder($customer_email,$shippingId)
    {

    	$product_details_byID = OrderDetailsModel::where('customer_email',$customer_email)->get();
    	$shipping_address = ShippingModel::where('id',$shippingId)->get();
    	return view('order.orderDetails')->with(['products'=> $product_details_byID,'shipping' => $shipping_address]);
    }

    public function orderSuccess($id)
    {
    	OrderHandellingModel::where('id',$id)->update(['order_status'=> 0]);
    	return redirect(route('showPendingOrder'));
    }

    public function orderPendig($id)
    {
    	OrderHandellingModel::where('id',$id)->update(['order_status'=> 1]);
    	return redirect(route('showPendingOrder'));
    }



}
