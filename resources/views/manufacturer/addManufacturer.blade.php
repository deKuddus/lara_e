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
						<form class="form-horizontal" method="post" action="{{  route('manufacturer.store') }}">
							@csrf
						  <fieldset>

							<div class="control-group">
							  <label class="control-label" for="catName">Category Name:</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="manufacturerNames" id="catName" placeholder="Write category Name here">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="manufacturerDescription" id="textarea2" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="status">Status:</label>
							  <div class="controls">
								<input type="checkbox" class="input-xlarge" name="status" id="status" value="1">status
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection