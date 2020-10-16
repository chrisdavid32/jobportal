
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
         
          <li class="nav-item active">
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
					<li class="nav-item">
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
										<h3>WELCOME {{strtoupper($data->last_name)}}, {{ucwords($data->first_name)}}</h3>
										<h6 class="font-weight-normal mb-0 text-muted">You have done 57.6% more sales today.</h6>
										@endif
									</div>
								</div>
								
								<div class="tab-content tab-transparent-content pb-0">
									<div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
										<div class="row">
											
											
											
											
										</div>
										<div class="row">
											<div class="col-12 col-sm-12 col-md-12 col-xl-12 grid-margin stretch-card">
												<div class="card">
													<div class="card-body">
														<div class="d-flex flex-wrap justify-content-between">
															<div>
																<h4 class="card-title mb-3">Revenue overview</h4>
															</div>
															<div>
																<div class="d-flex align-items-center">
																	<div class="dropdown mr-2 mb-2 d-none d-md-block">
																		<button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuSizeButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																		2019
																		</button>
																		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuSizeButton4" data-x-placement="bottom-end">
																			<a class="dropdown-item" href="#">2015</a>
																			<a class="dropdown-item" href="#">2016</a>
																			<a class="dropdown-item" href="#">2017</a>
																			<a class="dropdown-item" href="#">2018</a>
																		</div>
																	</div>
																	<div class="dropdown dropleft card-menu-dropdown">
																		<button class="btn p-0" type="button" id="cardMenuButtonsrevenue" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<i class="mdi mdi-dots-vertical card-menu-btn"></i>
																		</button>
																		<div class="dropdown-menu" aria-labelledby="cardMenuButtonsrevenue" x-placement="left-start">
																			<a class="dropdown-item" href="#">Action</a>
																			<a class="dropdown-item" href="#">Another action</a>
																			<a class="dropdown-item" href="#">Something else here</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<p class="text-muted">Customers who have upgraded the level of your products or service</p>
														<div class="mt-4 mb-4 d-sm-flex">
															<div id="legendContainer" class="mb-4 mr-4 legendContainer col-md-4 pl-0 pr-0"></div>
															<div class="col-md-6 pl-0 pr-0">
																<h6>Summary</h6>
																<p class="text-muted">A comparison of people who mark themeselves of their interest based from the date range given above.</p>
															</div>
														</div>
														<div class="row mt-1 d-sm-flex">
															<div class="col-12">
																<div class="flot-chart-container">
																	<div id="flotChart" class="flot-chart"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
						
							
								
								
									</div>
									<div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
										Tab Item
									</div>
									<div class="tab-pane fade" id="returns-1" role="tabpanel" aria-labelledby="returns-tab">
										Tab Item
									</div>
									<div class="tab-pane fade" id="more" role="tabpanel" aria-labelledby="more-tab">
										Tab Item
									</div>
								</div>
							</div>
						</div>
					</div>

@endsection