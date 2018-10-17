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


					@foreach ($category as $catValue)
						
					

						<form class="form-horizontal" method="post" action="{{  route('category.update',$catValue->id) }}">
							@csrf
							@method('PUT')
						  <fieldset>

							<div class="control-group">
							  <label class="control-label" for="catName">Category Name:</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="catNames" id="catName" value="{{$catValue->category_name}}">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="description" id="textarea2" rows="3">{{$catValue->category_description}}</textarea>
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
							</div>
						  </fieldset>
						</form>   
						@endforeach

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection