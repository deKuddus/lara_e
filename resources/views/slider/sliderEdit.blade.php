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
					@foreach ($slider as $s_slider)
						
						<form class="form-horizontal" method="post" action="{{  route('slider.update',$s_slider->id) }}" enctype="multipart/form-data">
							@csrf
							@method('PUT')
						  <fieldset>

							<div class="control-group">
							  <label class="control-label" for="sliderImage">Slider Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="sliderImage" id="sliderImage" type="file">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="sliderImage">Previous Slider</label>
							  <div class="controls">
								<img src="{{ asset($s_slider->slider_image) }}" style="height: 100px; width: 150px">
							  </div>
							</div>



							<div class="control-group">
							  <label class="control-label" for="sliderStatus">Slider Status</label>
							  <div class="controls">
								<input type="checkbox" class="input-xlarge" name="sliderStatus" id="sliderStatus" value="1"
									@if($s_slider->slider_status == 1)
										selected
										@endif

								>status
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>  
					@endforeach

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection