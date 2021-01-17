@extends('header')
@section('content')
<section>
		<div class="block no-padding  gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner2">
							<div class="inner-title2">
								<h3>How It Works</h3>
								<span>Get a digital tour of how ADSU recruitment works for you.</span>
							</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block ">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="how-works">
						<div class="how-workimg"><img src="{{ asset('assets/images/resource/hw1.jpg') }}" alt="" /></div>
							<div class="how-work-detail">
								<div class="how-work-box">
									<span>1</span>
									<i class="la la-file-text"></i>
									<h2>Job Requirement</h2>
									<h4>Academic Staff</h4>
									<p>i.Applicant must possess a BSc/HND (Minimum of second class lower Division) in relevant discipline plus or its equivalent with an NYSC discharge certificate.
									ii.Computer literacy will be an added advantage. 
                                    </p>
									<h4> Non Academic Staff</h4>
									<p>i.Applicant must possess a minimum of OND/NCE in relevant discipline 
                                    </p>
									<h4> Administrative Staff</h4>
									<p>i.Applicant must possess a minimum of Dr/Phd in relevant discipline....
									ii.Computer literacy will be an added advantage 
                                    </p>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="how-works flip">
							<div class="how-workimg"><img src="{{ asset('assets/images/resource/hw2.jpg') }}" alt="" /></div>
							<div class="how-work-detail">
								<div class="how-work-box">
									<span>2</span>
									<i class="la la-user"></i>
									<h3>Register an account</h3>
									<p>if you meet up to the above listed requirement navigate to job categories to create an account by clicking at Apply Now.
									 </p>
								</div>
							</div>
						</div>
						<div class="how-works">
							<div class="how-workimg"><img src="{{ asset('assets/images/resource/hw3.jpg') }}" alt="" /></div>
							<div class="how-work-detail">
								<div class="how-work-box">
									<span>3</span>
									<i class="la la-pencil"></i>
									<h3>Final Submission</h3>
									<p>make sure to fill in all forms properly before clicking on final submission cause there will be no room for editing after submission <br>
									All uploading file size must be less then 100KB.  </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection