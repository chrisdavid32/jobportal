@extends('header')
@section('content')

{{!$catID = Request::route('id')}}
{{!$catInfo = App\category::where('categoryid',$catID)->first()}}
{{!$catName = ucwords($catInfo->category_name)}}

<section>
		<div class="block remove-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="account-popup-area signup-popup-box static">
					<div class="col-lg-4" style="margin-left:400px">
						@include('alerts')
						
					</div>

							<div class="account-popup">
								<h3>Sign Up </h3>
								<span>complete the forms below to create an account <br> NOTE: make sure to use an active email</span>
								{!! Form::open(['url'=>'signup']) !!}
								
									<div class="cfield">
										<input type="text" name="firstName" placeholder="First name" />
										<i class="la la-user"></i>
									</div>
									<div class="cfield">
										<input type="text" name="lastName" placeholder="Last name" />
										<i class="la la-user"></i>
									</div>
									<div class="cfield">
										<input type="text" name="otherName" placeholder="Other name" />
										<i class="la la-user"></i>
									</div>
									<div class="cfield">
										<input type="hidden" name="category" value="{{$catID}}" />
										<input type="text"  value="{{$catName}}" readonly />
									</div>
										<select name="position" class="cfield" style="height:60px;width:425px">
											<option value="" selected>Select position </option>
											{{!$cat=App\post::where('cartid',$catID)->get()}}
											@foreach($cat as $job)
											<option value="{{$job->postid}}">{{ucwords($job->post)}}</option>
											@endforeach
										</select>
									<div class="cfield">
										<input type="text" name="phone" placeholder="Phone Number" />
										<i class="la la-phone"></i>
									</div>
									<div class="cfield">
										<input type="text" name="email" placeholder="Email" />
										<i class="la la-envelope-o"></i>
									</div>
									<div class="cfield">
										<input type="password" name="password" placeholder="Password" />
										<i class="la la-key"></i>
									</div>
									<div class="cfield">
										<input type="password" name="confirm_password" placeholder="Comfirm Password" />
										<i class="la la-key"></i>
									</div>
									<button type="submit">Signup</button>
								{!! Form::close() !!}
								<div class="extra-login">
									<span>Or</span>
								<a href="{{Config::get('constants.options.sitelink')}}login" ><h5> Already have an Account</h5>
									
								</div>
							</div>
						</div><!-- SIGNUP POPUP -->
					</div>
				</div>
			</div>
		</div>
	</section>



@endsection