@extends('header')
@section('content')


<section>
		<div class="block no-padding">
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-featured-sec style2">
							<ul class="main-slider-sec style2 text-arrows">
								<li class="slideHome"><img src="{{ asset('assets/images/resource/mslider3.jpg') }}" alt="" /></li>
								
								
							</ul>
							<div class="job-search-sec">
								<div class="job-search style2">
									<h3>ADSU STAFFS RECRUITMENT PORTAL</h3>
									<span>Find Jobs, Employment & Career Opportunities</span>
									</div><!-- Job Search 2 -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section >
	<marquee><h3 class="alert-success">ONLINE STAFF RECRUITMENT 
	<span style="color: orange;">DESIGNED BY: </span><span class="btn btn-success">
	15U/360637</span>,&nbsp;&nbsp; &nbsp;  <span class="btn btn-warning">
	16D/360331</span>AND<span class="btn btn-success">16U/567676/</span>
	SUPERVISED BY<span style="color: blue;">:Dr.IBRAHIM JIGRIL</span></h3></marquee>
	<section >
							<div class="job-search style2"  id='jobs'>
		<div class="block gray"  >
			<div class="container">
				<div class="row">
					<div class="col-lg-12" >
						<div class="heading">
							<h2>Jobs Categories</h2>
							<span>Have you taken time to read through the jobs vancancy requirement?<p>
               If so then chioce among the Jobs categories that you are qualify for and click on apply <br>
               NOTE: You are only to apply for just one post a dulplicate Application will be consider disqualified.</p>
               </span>
						</div><!-- Heading -->
						<div class="job-grid-sec">
							<div class="row" >
						{{!$cats = App\category::all()}}
							@foreach($cats as $cat)
								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" >
									<div class="job-grid" >
										<div class="job-title-sec" >
											<div class="c-logo"> </div>
											<h3><a href="" title="">{{ucwords($cat->category_name)}}
												</a></h3>
											<span>
											<p align="justify" id='gallery' >
											{{ucwords($cat->catDes)}}
											</p>
											</span>
											<span class="fav-job"><i class="la la-heart-o"  ></i></span>
										</div>
										<span class="job-lctn">Adamawa State </span>
										<a  href="registration/{{$cat->categoryid}}" title="">APPLY NOW</a>
									</div><!-- JOB Grid -->
								</div>
								@endforeach

								
								</div>
						</div>
					</div>
					</div>
			</div>
		</div>
	</section >
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Adamawa State University Mubi Gallery</h2>
							<span>Some of the few image of the institution.</span>
						</div><!-- Heading -->
						<div class="top-company-sec">
							<div class="row" id="companies-carousel">
								<div class="col-lg-3">
									<div class="top-compnay">
										<img src="{{ asset('assets/images/resource/adsu2.jpg') }}" alt="" />
										<h3><a href="#" title="">School Main Gate</a></h3>
										<span>Adamawa State University Mubi</span>
										
									</div><!-- Top Company -->
								</div>
								<div class="col-lg-3">
									<div class="top-compnay">
										<img src="{{ asset('assets/images/resource/adsu1.jpg') }}" alt="" />
										<h3><a href="#" title="">The Senate Building</a></h3>
										<span>Adamawa State University Mubi</span>
										
									</div><!-- Top Company -->
								</div>
								<div class="col-lg-3">
									<div class="top-compnay">
										<img src="{{ asset('assets/images/resource/adsu6.jpg') }}" alt="" />
										<h3><a href="#" title="">Multi Purpose Hall</a></h3>
										<span>Adamawa State University Mubi</span>
										
									</div><!-- Top Company -->
								</div>
								<div class="col-lg-3">
									<div class="top-compnay">
										<img src="{{ asset('assets/images/resource/adsu5.jpg') }}" alt="" />
										<h3><a href="#" title="">The Institution Logo</a></h3>
										<span>Adamawa State University Mubi</span>
										
									</div><!-- Top Company -->
								</div>
                <div class="col-lg-3" >
									<div class="top-compnay">
										<img src="{{ asset('assets/images/resource/adsu7.jpg') }}" alt="" />
										<h3><a href="#"  title="" id='recruit'>Lecture Theatre</a></h3>
										<span>Adamawa State University Mubi</span>
										
									</div><!-- Top Company -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section >

	<section >
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Adamawa State University Mubi Jobs Recruitment</h2>
							<span>Online Staffs Massive Recruitment Manegement System Site <br />To create room for quality fresh gradual.
							</span>
						</div><!-- Heading -->
						<div class="how-to-sec">
							<div class="how-to">
								<span class="how-icon"><i class="la la-user"></i></span>
								<h3>Register an account</h3>
								<p>make sure you create an account with an active email and contact number to enble us reach you.</p>
							</div>
							<div class="how-to">
								<span class="how-icon"><i class="la la-file-archive-o"></i></span>
								<h3>File Upload</h3>
								<p>Make sure to fill all forms properly with the applicant right infomation and upload valid document. </p>
							</div>
							<div class="how-to">
								<span class="how-icon"><i class="la la-list"></i></span>
								<h3>Apptitude Test</h3>
								<p>Selected applicant will be Alerted to take Apptitude test Online.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section >
		
  <section id='contact'>
		<div class="block" >
			<div class="container " >
				 <div class="row">
				 	<div class="col-lg-6 column">
				 		<div class="contact-form">
				 			<h3>Keep In Touch</h3>
				 			<form>
				 				<div class="row" >
				 					<div class="col-lg-12">
				 						<span class="pf-title">Full Name</span>
				 						<div class="pf-field" >
				 							<input type="text" placeholder="Input Full name" />
				 						</div>
				 					</div>
				 					<div class="col-lg-12" >
				 						<span class="pf-title">Email</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="email" />
				 						</div>
				 					</div>
				 					<div class="col-lg-12" >
				 						<span class="pf-title">Subject</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Enter subject" />
				 						</div>
				 					</div>
				 					<div class="col-lg-12" >
				 						<span class="pf-title">Message</span>
				 						<div class="pf-field">
				 							<textarea></textarea>
				 						</div>
				 					</div>
				 					<div class="col-lg-12">
				 						<button type="submit">Send</button>
				 					</div>
				 				</div>
				 			</form>
				 		</div>
				 	</div>
				 	<div class="col-lg-6 column">
					 	<div class="contact-textinfo">
					 		<h3>ADSU Office</h3>
					 		<ul>
					 			<li><i class="la la-map-marker"></i><span> Mubi Adamawa State</span></li>
					 			<li><i class="la la-phone"></i><span>Call Us : +2347035202925</span></li>
					 			<li><i class="la la-fax"></i><span>Fax : 0934 343 343</span></li>
					 			<li><i class="la la-envelope-o" id='about'></i><span>Email : <a href="https://grandetest.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6900070f062903060b011c071d470a0604">[email&#160;protected]</a></span></li>
					 		</ul>
					 		<a class="fill" href="#" title="">See on Map</a><a href="#" title="">Directions</a>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section >
	<section >
		<div class="block">
			<div class="container" >
				 <div class="row">
				 	<div class="col-lg-12">
				 		<div class="about-us">
				 			<div class="row">
				 				<div class="col-lg-12">
				 					<h3>About Adamawa State University Mubi</h3>
				 				</div>
				 				<div class="col-lg-7" >
				 					<p>Established in 2002, Adamawa State University is a non-profit public higher education institution located
									  in the large town of Mubi (population range of 50,000-249,999 inhabitants), Adamawa. Officially accredited
									   and/or recognized by the National Universities Commission, Nigeria, Adamawa State University (ADSU)
									    is a coeducational higher education institution. Adamawa State University (ADSU) 
										offers courses and programs leading to officially recognized higher education degrees such as bachelor degrees
										 in several areas of study. 
									 </p>
							 	</div>
				 				<div class="col-lg-5" id='about'>
				 					<img src="{{ asset('assets/images/resource/adsu8.jpg') }}" alt="" />
				 				</div>
				 				
				 			</div>
				 			
				 		</div>
				 	</div>
				 </div>
			</div>
		</div>
	</section>

@endsection