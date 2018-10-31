@extends('layouts')
 

@section('content')

@include('pages.sidebar')

		<section id="cart_items">
		<div class="container col-md-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php 

							$allCartProduct = Cart::content();
						?>
						
						<?php 
						foreach ($allCartProduct as $product){ ?>


							
						
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ asset($product->options->image) }}" alt="" height="80px" width="80px"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$product->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{$product->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{ route('updateCart',$product->rowId) }}" method= "post">
									@csrf
									<input class="cart_quantity_input" type="text" name="qty" value="{{$product->qty}}" autocomplete="off" size="2">
									<input class="cart_quantity_input" type="submit" name="submit" value="update" autocomplete="off" size="2">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$product->total}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ route('cartdelete',$product->rowId) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
							<li>Eco Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}}1</span></li>
						</ul>
							<a class="btn btn-default update" href="{{ url('/') }}">Continue Shoping</a>
							<a class="btn btn-default check_out" href="{{ route('checkout') }}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection