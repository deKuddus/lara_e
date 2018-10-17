@extends('admin.adminlayouts')

@section('admin_maincontent')
							
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
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
						<?php 
							$message = Session::get('message');
							if($message){
								echo "<p class='alert-info'>".$message."</p>";
								Session::put('message',NULL);
							}

						?>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>Category Name</th>
								  <th>Category Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($categories as $category)
							<tr>
								<td>{{$category->id}}</td>
								<td>{{$category->category_name}}</td>
								<td>{{$category->category_description}}</td>
								<td class="center">
									@if($category->category_status ==1)
										<span class="label label-success">Active</span>
									@else
										<span class="label label-danger">Deactive</span>
									@endif
								</td>
								<td class="center">
									@if($category->category_status == 1)
										<a class="btn btn-danger" href="{{url('admin/category/active/'.$category->category_id)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									@else
										<a class="btn btn-success" href="{{url('admin/category/deactive/'.$category->category_id)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
									@endif
									<a class="btn btn-info" href="{{ route('category.edit',$category->id) }}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<span>
										<form action="{{route('category.destroy',$category->id)}}" method="post" id="delete_form_{{$category->id}}" style="display: none">
					                      {{csrf_field()}}
					                      {{method_field('DELETE')}}
					                     </form>
					                     <a href="" onclick="

					                      if(confirm('Are sure to delete?'))
					                      {
					                        event.preventDefault();
					                        document.getElementById('delete_form_{{$category->id}}').submit();
					                      }
					                      else{
					                        event.preventDefault();
					                      }
					                     " class="btn btn-danger">
					                        <i class="halflings-icon white trash"></i> 
					                    </a>
									</span>
								</td>
							</tr>
						@endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
@endsection