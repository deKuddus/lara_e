@extends('layouts')

@section('content')

@include('pages.sidebar')

		<section id="cart_items">
		<div class="container">
			<div class="register-req">
				<p>Please provide your shiping address below</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-8 clearfix">
							<div class="bill-to">
								<p>Bill To</p>

								<div class="form-one">
									<form action="{{ route('saveShippingAddress') }}" method="post">
										@csrf
										<input type="text" name="firstName" placeholder="First Name *">
										@if ($errors->has('firstName'))
		                                    <span class="invalid-feedback alert-danger alert-danger" role="alert">
		                                        <strong>{{ $errors->first('firstName') }}</strong>
		                                    </span>
		                                @endif
										<input type="text" name="lastName" placeholder="Last Name *">
										@if ($errors->has('lastName'))
		                                    <span class="invalid-feedback alert-danger" role="alert">
		                                        <strong>{{ $errors->first('lastName') }}</strong>
		                                    </span>
		                                @endif
										<input type="email" name="email" placeholder="Email*">
										@if ($errors->has('email'))
		                                    <span class="invalid-feedback alert-danger" role="alert">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
		                                @endif
										<input type="text" name="mobile" placeholder="mobile">
										@if ($errors->has('mobile'))
		                                    <span class="invalid-feedback alert-danger" role="alert">
		                                        <strong>{{ $errors->first('mobile') }}</strong>
		                                    </span>
		                                @endif
										<input type="text" name="address1" placeholder="Address 1 *">
										@if ($errors->has('address1'))
		                                    <span class="invalid-feedback alert-danger" role="alert">
		                                        <strong>{{ $errors->first('address1') }}</strong>
		                                    </span>
		                                @endif
										<input type="text" name="address1" placeholder="Address 2 {optional}">
										<input type="text" name="city" placeholder="City">
										@if ($errors->has('city'))
		                                    <span class="invalid-feedback alert-danger" role="alert">
		                                        <strong>{{ $errors->first('city') }}</strong>
		                                    </span>
		                                @endif
										
				                            <label  class="col-sm-8 col-form-label text-md-right"></label>
				                            <div class="col-sm-0">
				                             	<button  class="btn btn-warning">Register</button><br>
				                           </div>
			                        
									</form>
								</div>
							</div>			
					</div>
				</div>
				<div class="review-payment">
					<h2>Review & Payment</h2>
				</div>

			</div>
		</div>

	</section> <!--/#cart_items-->

@endsection