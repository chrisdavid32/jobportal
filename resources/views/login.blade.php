@extends('header')
@section('content')

<section>
		<div class="block remove-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="account-popup-area signin-popup-box static">
							<div class="account-popup">
							@include('alerts')
								<span>Login with your register email address and password to continue.</span>
								{!! Form::open(['url'=>'signin']) !!}
									<div class="cfield">
										<input type="text" name="email" placeholder="Username" />
										<i class="la la-user"></i>
									</div>
									<div class="cfield">
										<input type="password" name="password" placeholder="Password" />
										<i class="la la-key"></i>
									</div>
									<p class="remember-label">
										<input type="checkbox" name="cb" id="cb1"><label for="cb1">Remember me</label>
									</p>
									<a href="#" title="">Forgot Password?</a>
									<button type="submit">Login</button>
									{!! Form::close() !!}
								</div>
						</div><!-- LOGIN POPUP -->
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection