@extends('applicant.header')
@section('content')
<?php
$dt=App\result::where('useremail',session()->get('useremail'))->count();
$dg=App\result::where('useremail',session()->get('useremail'))->first(); ?>
@if(empty(session()->get('useremail')))
	<script>
	window.location="login";
	</script>
	@elseif(session()->get('role')!=2)
	<script>
	window.location="login";
	</script>
	@else 
		{{!$data = App\signup::where('email',session()->get('useremail'))->first()}}

	@endif

<body>
		<div class="container-scroller">
			<!-- partial:partials/_navbar.html -->
			<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-left navbar-brand-wrapper d-flex align-items-center justify-content-between">
          <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item dropdown align-items-center d-lg-flex d-none">
              <a class="dropdown-toggle btn btn-outline-secondary btn-fw"  href="#" data-toggle="dropdown" id="appDropdown">
              <span class="nav-profile-name">Logout</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="appDropdown">
                <a class="dropdown-item" href="{{Config::get('constants.options.sitelink')}}logout">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
                </a>
              </div>
            </li>
          </ul>
          
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
			<!-- partial -->
			<div class="container-fluid page-body-wrapper">
				<!-- partial:partials/_settings-panel.html -->
        
        <!-- partial -->
				<!-- partial:partials/_sidebar.html -->
				<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
         
          <li class="nav-item">
            <a class="nav-link" href="dashboard">
            <i class="mdi mdi-palette menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a class="nav-link" href="applicant">
            <i class="mdi mdi-application"></i>
            <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apply</span>
            </a>
          </li>
					<li class="nav-item active">
            <a class="nav-link" href="aptitudetest">
            <i class="mdi mdi-pencil menu-icon"></i>
            <span class="menu-title">Take Apptitude Test </span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="checkstatus">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">Check Status</span>
            </a>
          </li>
           
           <li class="nav-item">
            <a class="nav-link" href="appointmentletter">
            <i class="mdi mdi-printer"></i>
            <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print Appointment Letter</span>
            </a>
          </li>
          </ul>
      </nav>
				<!-- partial -->


				<div class="main-panel">
					<div class="content-wrapper">
						<div class="row">
							<div class="col-md-12">   
                  

								<div class="row">
									<div class="col-sm-6 mb-4 mb-xl-0">
									@if(!empty(session()->get('useremail')))
										<h3>Wellcome: {{strtoupper($data->last_name)}}, {{ucwords($data->first_name)}}</h3>
											@endif
									</div>
								</div>
               
								<div class="card">
								<div class="card-body">
                @include('applicant.alerts')
                <div class="tab-content tab-transparent-content pb-0">
									<div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">                           
                     

              <div align="center" class="row col-md-12 form-control" id="timeout" style="display:none;">
            <h1> <i class="mdi mdi-timer-off" style="color:red;"></i> Oops! Time Out.</h1>
                  <h3> You have run out of Time. <br/><br/> Kindly Click the Submit Button </h3>	
            </div>  
            @if($dg->stat  < 1)  
                  <div id="timer"></div>
                  @endif
 

							
								@if($dt > 0)
                  @if($dg->stat > 0)

                  <h1  style="color:green;"><i class="mdi mdi-check-all"></i> Congratulations!</h1>
                  <h2> Your have completed your Apptitude Test Screening.</h2>
                  <h3> Your test score is <b  style="color:green;">{{$dg->score}}%</b> </h3>

                  @else 
                  
                    
              <?php
              $questions = App\test::where('categoryid',$data->job_type)->get();
              ?>
              
              {!! Form::open(['url'=>'savetest']) !!}
              <div class="row "id="questionbody">
            {{!$sn=1}}
              @foreach($questions as $question)
							  <div class="col-md-12 form-control" style="margin-bottom:20px; border:0.1em solid blue" >
                  <label class="form-control">{{$sn++}}. {{ucfirst($question->question)}}</label>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-control">
                        <input type="radio" required="required" name="question{{$sn}}" value="A" /> {{ucfirst($question->option_a)}}
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label class="form-control">
                        <input type="radio" required="required"  name="question{{$sn}}" value="B" />  {{ucfirst($question->option_b)}}
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label class="form-control">
                        <input type="radio" required="required"   name="question{{$sn}}" value="C" />  {{ucfirst($question->option_c)}}
                      </label>
                    </div>
                    <div class="col-md-6">
                      <label class="form-control">
                        <input type="radio" required="required"   name="question{{$sn}}" value="D" />  {{ucfirst($question->option_d)}}
                      </label>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
              <br/>
              <br/>
            <span style="" class="btn btn-primary" id="conf">
              <i class="mdi mdi-content-save-all"></i>
               Save
            </span>

            <button style="float:right; display:none;" id="pussy" class="btn btn-success">
              <i class="mdi mdi-marker-check"></i>
              Submit
            </button>

            {!! Form::close() !!}
                  

                  @endif
        
                @else
                 <h2>You are not approved to write apptitde test</h2>
                @endif
               
                      
                    </div>
							    </div>  		
							</div>
						</div>
					</div>
          <?php
          
App\result::where('useremail',session()->get('useremail'))->update(['stat'=>'1']);
          ?>
                    </div>
                    <script src="{{ asset('js/jquery.min.js') }}"></script>  
                    <script>
        $('#conf').on('click', function(){
          confirm('Are sure to ');
          document.getElementById('conf').style.display="none";
          document.getElementById('pussy').style.display="block";
        });

        $('#timer').load('timer');
      
        </script>

        

@endsection