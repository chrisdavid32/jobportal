@extends('applicant.header')
@section('content')
{{!$userInfo= App\signup::where('email',session()->get('useremail'))->first()}}
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
                <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
                </a>
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
					<li class="nav-item">
            <a class="nav-link" href="pages/ui-features/popups.html">
            <i class="mdi mdi-pencil menu-icon"></i>
            <span class="menu-title">Take Apptitude Test </span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/popups.html">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">Check Status</span>
            </a>
          </li>
           
           <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/popups.html">
            <i class="mdi mdi-printer"></i>
            <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print Appointment Letter</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/popups.html">
            <i class="mdi mdi-drawing-box menu-icon"></i>
            <span class="menu-title">Change Password</span>
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
										<h3>WELCOME </h3>
										
									</div>
								</div>
								
								<div class="tab-content tab-transparent-content pb-0">
									<div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
										<div class="row">
											
											
											
											
										</div>
										<div class="col-md-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                            <h3 class="card-title">APPLICATION FORM</h3>
                                            <p class="card-description">
                                            <?php $info=session()->get('applicatedata'); ?>
                                             <h4> BIO-DATA</h4>
                                            </p>
                          {!! Form::open(['url'=>'endApply', 'files'=>true]) !!}
                                            @include('applicant.alerts')
                                            <div class="row">
                                                <div class="form-group row col-sm-8">
                                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Last Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="exampleInputUsername2" value="{{ucwords($userInfo->last_name)}}" readonly >
                                                    </div>
                                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">First Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="exampleInputUsername2" value="{{ucwords($userInfo->first_name)}}" readonly >
                                                    </div>
                                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Other Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="exampleInputUsername2" value="{{ucwords($userInfo->other_name)}}" readonly >
                                                    </div>

                                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Gender</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="exampleInputUsername2" value="{{ucwords($info['gender'])}}" readonly>
                                                    </div>

                                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Date of Birth</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" id="exampleInputEmail2" value="{{$info['dob']}}" readonly>
                                                    </div>
                                                    
                                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Place of Birth</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="exampleInputMobile" value="{{ucwords($info['birth'])}}" readonly>
                                                </div>
                                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">State of Origin</label>
                                                <div class="col-sm-9">
                                                {{!$data = App\state::where('stateid',$info['state'])->first()}}
                                                    <input type="text" class="form-control" id="exampleInputPassword2" value="{{ucwords($data['state'])}}" readonly>
                                                </div>
                                                <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">LGA</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="exampleInputConfirmPassword2" value="{{ucwords($info['lga'])}}" readonly>
                                                </div> 
                                                </div>

                                                    <div class="form-group col-sm-4">
                                                      <img src="{{$info['passport']}}"  alt="passport" style="height:150px; width:150px;border:2px"  />
                                                    </div>
                                                </div>
                                                <p class="card-description">
                                                <h4> CONTACT INFORMATION</h4>
                                                </p>
                                                <div class="form-group row col-sm-8">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Home Address</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="exampleInputUsername2" value="{{ucwords($info['homeAddress'])}}" readonly>
                                                </div>
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Parmanent Address</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="exampleInputEmail2" value="{{ucwords($info['ParmannentAddress'])}}" readonly>
                                                </div>
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email Address</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="exampleInputEmail2"  value="{{$userInfo->email}}" readonly > 
                                                </div>
                                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Phone Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="exampleInputMobile" value="{{$userInfo->phone}}" readonly  >
                                                </div>
                                                </div>
                                                
                                                <p class="card-description">
                                                  <h4> NEXT OF KIN INFORMATION</h4>
                                                  </p>
                                                  <div class="form-group row col-sm-8">
                                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Next of Kin Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="exampleInputUsername2" value="{{ucwords($info['nokName'])}}" readonly>
                                                </div>
                                                </div>
                                                <div class="form-group row col-sm-8">
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Next of Kin Address</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="exampleInputEmail2" value="{{ucwords($info['nokAddress'])}}" readonly>
                                                </div>
                                                </div>
                                                <div class="form-group row col-sm-8">
                                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Next of Kin Phone </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="exampleInputMobile" value="{{$info['nokPhone']}}" readonly>
                                                </div>
                                                </div>
                                                <div class="form-group row col-sm-8">
                                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Relationship</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="exampleInputMobile" value="{{ucwords($info['relationship'])}}" readonly>
                                                </div>
                                                </div>
                                                <h4> CREDENTIAL INFORMATION</h4>
                                                {{!$jobInfo = App\post::where('postid',$userInfo->job_id)->first()}}
                                                {{!$credInfo = App\credential::where('job_id',$userInfo->job_id)->get()}}
                                            </p>
                                                <div class="form-group row col-sm-8">
                                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Post Apply</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="exampleInputEmail2"  value="{{$jobInfo->post}}" readonly >
                                                </div>
                                                </div>
                                                <div class="form-group row col-sm-8">
                                                <label for="exampleInputMobile" class="col-sm-3 col-form-label"> Uploads </label>
                                                <div class="col-sm-9">
                                                    <textarea id="maxlength-textarea" class="form-control" rows="6" readonly>
                                                    @foreach($credInfo as $cred)
                                                      {{ucwords($cred->c_type)}}
                                                    @endforeach
                                                    </textarea>
                                                </div>
                                                </div>
                                                <p class="card-description col-sm-8">
                                                <h5>I, Hereby Declare that all information <br> provided  are to the best of my Knowledge and valid</h5>
                                            </p>   
                                                <div class="form-check form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="check">
                                                    By check on this box you agree to all condition
                                                </label>
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                <button class="btn btn-light">Back</button>
                          {!! Form::close() !!}
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