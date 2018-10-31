@extends('admin.adminlayouts')

@section('admin_maincontent')
							
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Orders</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>Customer Name</th>
								  <th>Order Balance</th>
								  <th>Status</th>
								
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($orders as $order)
							<tr>
								<td>{{$order->id}}</td>
								<td>{{$order->customer_email}}</td>
								<td>{{$order->total_order}}</td>
								<td class="center">
									@if($order->order_status ==1)
										<span class="label label-success">Order Deliveried</span>
									@else
										<span class="label label-danger">Pending</span>
									@endif
								</td>
								
								<td class="center">
									@if($order->order_status == 1)
										<a class="btn btn-danger" href="{{url('admin/order/success/'.$order->id)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									@else
										<a class="btn btn-success" href="{{url('admin/order/pending/'.$order->id)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
									@endif
									<a class="btn btn-info" href="{{ route('seeOrderDetails',[$order->customer_email,$order->shipping_id]) }}" >
										<i class="halflings-icon eye-open"></i>   
									</a>
								</td>

							</tr>
						@endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
@endsection