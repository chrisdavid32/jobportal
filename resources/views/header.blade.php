<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 May 2019 02:35:11 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>FPM Staff Recruitment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-grid.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors/colors.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/css/fonts/font-awesome.min.css') }}" />
	
</head>
<body>



<div class="theme-layout" id="scrollup">
	
	<div class="responsive-header">
		<div class="responsive-menubar">
			<div class="res-logo"><a href="index-2.html" title="">
			<img src="{{ asset('assets/images/resource/logo.png') }}" alt="" /></a></div>
			<div class="menu-resaction">
				<div class="res-openmenu">
					<img src="{{ asset('assets/images/icon.png') }}" alt="" /> Menu
				</div>
				<div class="res-closemenu">
					<img src="{{ asset('assets/images/icon2.png') }}" alt="" /> Close
				</div>
			</div>
		</div>
		<div class="responsive-opensec">
		
		@if(Request::is('registration')==false)
			<div class="btn-extars">
				<a href="requirement" title="" class="post-job-btn"><i class=""></i>Requirement</a>
				<ul class="account-btns">
					<li><a href="login" class=""><i class="la la-external-link-square"></i> Login</a></li>
				</ul>
			</div><!-- Btn Extras -->
			@endif
			<form class="res-search">
				<input type="text" placeholder="Job title, keywords or company name" />
				<button type="submit"><i class="la la-search"></i></button>
			</form>
			<div class="responsivemenu">
				<ul>
				@if(Request::is('registration'))
				<li><a href="{{Config::get('constants.options.sitelink')}}" title="">Home</a></li>
				@else
						<li><a href="#" title="">Home</a></li>
							<li class="menu-item">
							<li><a href="#" title="">Jobs</a>
							</li>
							<li class="menu-item">	
							<a href="#" title="">FPM gallery</a>
							</li>
							<li class="menu-item">
							<a href="#" title="">Recruit Process</a>
							</li>
							<li class="menu-item">
							<a href="#" title="">Contact</a>
							</li>
							<li class="menu-item">
							<a href="#" title="">About Us</a>
						</li>
						@endif
					</ul>
			</div>
		</div>
	</div>
	
	<header class="gradient forsticky">
		<div class="menu-sec">
			<div class="container">
				<div class="logo">
					<a href="#" title=""><img class="hidesticky" src="{{ asset('assets/images/resource/log.jpeg') }}" alt="" /><img class="showsticky" src="{{ asset('assets/images/resource/log.jpeg') }}" alt="" /></a>
				</div><!-- Logo -->
				@if(Request::is('registration')==false)
				<div class="btn-extars">
					<a href="{{Config::get('constants.options.sitelink')}}requirement" title="" class="post-job-btn"><i class=""></i>Requirement</a>
					<ul class="account-btns">
					<li><a href="{{Config::get('constants.options.sitelink')}}login" class=""><i class="la la-external-link-square"></i> Login</a></li>
					</ul>
				</div><!-- Btn Extras -->
				@endif
				<nav>
					<ul>
						@if(Request::is('registration'))
						<li class="menu-item">
							<a href="{{Config::get('constants.options.sitelink')}}" title="">Home </a>
						</li>
						@else
						<li class="menu-item">
							<a href="{{Config::get('constants.options.sitelink')}}" title="">Home</a>
						</li>
						<li class="menu-item">
							<a href="{{Config::get('constants.options.sitelink')}}#jobs" title="">Job</a>
						</li>
						<li class="menu-item">
							<a href="{{Config::get('constants.options.sitelink')}}#gallery" title="">FPM Gallery</a>
						</li>
						<li class="menu-item">
							<a href="{{Config::get('constants.options.sitelink')}}#recruit" title="">Recruit Process</a>
						</li>
						<li class="menu-item">
							<a href="{{Config::get('constants.options.sitelink')}}#contact" title="">Contact</a>
							</li>
						<li class="menu-item">
							<a href="{{Config::get('constants.options.sitelink')}}#about" title="">About Us</a>
							</li>
						@endif
				</nav><!-- Menus -->
			</div>
		</div>
	</header>

	@yield('content');

	

	<footer class="gray">
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="widget">
							<div class="mega-widget">
								<div class="logo"><a href="#" title=""><img src="images/resource/logo3.png" alt="" /></a></div>
								<div class="links">
									<a href="#" title="">About Us</a>
									<a href="#" title="">Terms & Policies</a>
									<a href="#" title="">How It Works</a>
									<a href="#" title="">Support</a>
									<a href="#" title="">Contact Us</a>
								</div>
								<span>P.M.B 35 Mubi Adamawa State.</span>
								<span>+2347035202925</span>
								<span><a href="https://grandetest.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="51383f373e113b3e3339243f257f323e3c">[email&#160;:chrisdavid3271@gmail.com]</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-line style2">
			<span>© 2019 FPM All rights reserved. Design by CHRISDAVID</span>
			<a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
		</div>
	</footer>

</div>

<script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/modernizr.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/wow.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/slick.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/parallax.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/select-chosen.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/counter.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/jquery.scrollbar.min.js') }}" type="text/javascript"></script>
</body>
</html>

