@extends('admin.adminlayouts')

@section('admin_maincontent')
							
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Orders Details </a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Product details</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped ">
						  <thead>
							  <tr>
								  <th>ProductID</th>
								  <th>Priduct  Name</th>
								  <th>Product Price</th>
								  <th>Product Quantity</th>
								  <th>Total Price</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php
						  		$sum = 0;
						  	 	foreach($products as $product){ ?>
						  	
								<tr>
									<td><?php echo $product->product_id;?></td>
									<td><?php echo $product->product_name;?></td>
									<td><?php echo $product->product_price;?></td>
									<td><?php echo $product->product_quantity;?></td>
									<td><?php echo $product->product_quantity * $product->product_price;?></td>

								</tr>
									
										

									
							<?php 
							$total = $product->product_quantity * $product->product_price;
							$sum = $sum + $total; 	
						} 
							$vat = ($sum/100)*2;
						?>
							<tfoot>
							<tr>
								<td colspan="4" style="text-align: right;ss">  Toatal = </td>
								<td> {{$sum + $vat}} </td>
							</tr>
							</tfoot>

						  </tbody>

					  </table> 
<br>
<h1 style="font-weight: bold">Shipping Address</h1>
<hr>
					 <table class="table table-striped ">
					
							
				
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>customer Name</th>
								  <th>Customer Email</th>
								  <th>Customer Mobile</th>
								  <th>Customer Address1</th>
								  <th>Customer Address2</th>
							
								  <th>Customer City</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach ($shipping as $shipping_address)
							<tr>
								<td>{{$shipping_address->id}}</td>
								<td>{{$shipping_address->customer_fname ." ". $shipping_address->customer_lname}}</td>
								<td>{{$shipping_address->customer_email}}</td>
								<td>{{$shipping_address->customer_phone}}</td>
								<td>{{$shipping_address->customer_address1}}</td>

								
								<td>{{$shipping_address->customer_address2 }}</td>								
								

								<td>{{$shipping_address->customer_city }}</td>
							</tr>

							@endforeach
						  </tbody>
					

					  </table> 



					</div>

				</div><!--/span-->
			
			</div><!--/row-->


@endsection