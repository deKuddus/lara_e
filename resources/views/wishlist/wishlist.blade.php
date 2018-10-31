@extends('layouts')
 

@section('content')

@include('pages.sidebar')

		<section id="cart_items">
		<div class="container col-md-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Wish list</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Product Image</td>
							<td class="description">Product Name</td>
							<td class="price">Price</td>
							<td>Remove</td>
						</tr>
					</thead>
					<tbody>
	
						@foreach ($wishlists as $product)


							
						
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ asset($product->product_image) }}" alt="" height="80px" width="80px"></a>
							</td>
							<td class="cart_description">
								<h4>{{$product->product_name}}</h4>
							</td>
							<td class="cart_price">
								<p>{{$product->product_price}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ route('compareRemove',$product->id) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->



@endsection