
@extends('applicant.header')
@section('content')

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
          <a class="navbar-brand brand-logo" href="index.html"><img src="http://www.urbanui.com/hiliteui/template/images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="http://www.urbanui.com/hiliteui/template/images/logo-mini.svg" alt="logo"/></a> 
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
            <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Continue Application</span>
            </a>
          </li>
					<li class="nav-item ">
            <a class="nav-link" href="aptitudetest">
            <i class="mdi mdi-pencil menu-icon"></i>
            <span class="menu-title">Take Apptitude Test </span>
            </a>
          </li>
           <li class="nav-item active" >
            <a class="nav-link" href="checkstatus">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">Check Status</span>
            </a>
          </li>
           
           <li class="nav-item">
            <a class="nav-link" href="appointmentletter">
            <i class="mdi mdi-printer"></i>
            <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print Acceptence Letter</span>
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
										<h3>WELCOME {{strtoupper($data->last_name)}}, {{ucwords($data->first_name)}}</h3>
									@endif
									</div>
								</div>
								<div class="card">
								<div class="card-body">
                <?php $dt=App\appointment::where('useremail',session()->get('useremail'))->count(); ?>
								@if($dt > 0)
                  <h1> <i class="mdi mdi-thumb-up-outline"></i> Congratulations</h1><br/><br/>
                  <h3> You are Selected for Physical Interview. </h3>	<br/><br/>
                  <h5>Click to proceed </h5>
                  <a href="appointmentletter">
                    <button class="btn btn-primary"> 
                      <i class="mdi mdi-printer"></i> Print Letter
                    </button>
                  </a>
								@else 
                  <h1> <i class="mdi mdi-alert-outline" style="color:red;"></i> Oops!</h1><br/><br/>
                  <h3> No shortlistment at this time. <br/><br/> Kindly check back in two (2) weeks. </h3>	
                @endif
							    </div>  		
							</div>
						</div>
					</div>
                    </div>

@endsection