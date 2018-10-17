@extends('admin.adminlayouts')

@section('admin_maincontent')
				<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>


						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						
					<h1 class="center"> 
				         @if ($errors->any())
					          <div class="alert alert-info">
					              <ul>
					                  @foreach ($errors->all() as $error)
					                      <h3>{{ $error }}</h3>
					                  @endforeach
					              </ul>
					          </div>
					      @endif
					    
			        </h1>
			        <p class="alert-danger" style="text-align: center;">
					    @php
					    	$message = Session::get('error');
					    	if($message){

					    		echo $message;

					    		Session::put('error',NULL);
					    	}
					    @endphp
					</p>
					@foreach ($editProduct as $product)
						
						<form class="form-horizontal" method="post" action="{{  route('product.update',$product->id) }}" enctype="multipart/form-data">
							@csrf
							@method('PUT')
						  <fieldset>

							<div class="control-group">
							  <label class="control-label" for="productName">Product Name:</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="productName" id="productName" value="{{$product->product_name}}">
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="category_id" >Category</label>
								<div class="controls">
								  <select id="category_id" name="category_id">
								  	@foreach ($categories as $category)
									<option value="{{$category->id}}" 

											<?php if($category->id == $product->product_ld){  ?>
											selected
											<?php } ?>
										>{{$category->category_name}}</option>

								  		
								  	@endforeach

								  </select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="manufacturer_id">Manufacturer</label>
								<div class="controls">
								  <select id="manufacturer_id" name="manufacturer_id">
								  	@foreach ($manufactureres as $manufacturer)
								  		
									<option value="{{$manufacturer->id}}" 

										<?php if($manufacturer->id == $product->manufacturer_ld){  ?>
											selected
											<?php } ?>


										>{{$manufacturer->manufacturer_name}}</option>

								  	@endforeach

								  </select>
								</div>
							</div>


							<div class="control-group hidden-phone">
							  <label class="control-label" for="product_sd">Product Sort Desc</label>
							  <div class="controls">
								<textarea class="cleditor" id="product_sd" name="product_sd" rows="3">
									{{$product->product_sort_desc}}
								</textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="product_ld">Product Long Desc</label>
							  <div class="controls">
								<textarea class="cleditor" id="product_ld" name="product_ld" rows="3">
									{{$product->product_long_desc}}
								</textarea>
							  </div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="productImage">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="productImage" id="productImage" type="file">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="productImage">Previous Image</label>
							  <div class="controls">
								<img src="{{asset($product->product_image)}}" height="50px" width="100px">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="productPrice">Price:</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="productPrice" id="productPrice" value="{{$product->product_price}}">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="productColor">Product Color:</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="productColor" id="productColor" value="{{$product->product_color}}"">
							  </div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="productSize">Product Size:</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="productSize" id="productSize" value="{{$product->product_size}}">
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   
					@endforeach

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection