@extends('admin.header')
@section('content')
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
               <a class="dropdown-item" href="{{Config::get('constants.options.sitelink')}}">
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
            <a class="nav-link" href="admin">
            <i class="mdi mdi-palette menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a class="nav-link" href="job">
            <i class="mdi mdi-application"></i>
            <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Job Categories</span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="position">
            <i class="mdi mdi-view-headline menu-icon"></i>
            <span class="menu-title">Job Position</span>
            </a>
          </li>
			<li class="nav-item active">
            <a class="nav-link" href="credential">
            <i class="mdi mdi-pencil menu-icon"></i>
            <span class="menu-title">Job Credential </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="information">
            <i class="mdi mdi-application"></i>
            <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pending Screen Applicant</span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="approvedapplicate">
            <i class="mdi mdi-application"></i>
            <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Screened Applicant</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="question">
            <i class="mdi mdi-application"></i>
            <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload Aptitude Test</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="screening">
            <i class="mdi mdi-printer"></i>
            <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aptitude Test Result</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="status">
            <i class="mdi mdi-drawing-box menu-icon"></i>
            <span class="menu-title">Update Applicant Status</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="appointment">
            <i class="mdi mdi-drawing-box menu-icon"></i>
            <span class="menu-title">Applicant List</span>
            </a>
          </li>
          </ul>
          </ul>
      </nav>
				<!-- partial -->
				<div class="main-panel">
					<div class="content-wrapper">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-sm-6 mb-4 mb-xl-0">
										<h3>JOB CREDENTIAL</h3>
										</div>
								</div>
                
                <div class="tab-content tab-transparent-content pb-0">
									<div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                  @include('applicant.alerts')
                    <div class="row">
                    <div class="col-md-5 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Add Job Credentials</h4>
                          {!! Form::open(['url'=>'cred']) !!}
                          <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Position Name</label>
                            <div class="col-sm-8">
                            {{!$data = App\post::all()}}
                              <select class="form-control" name="jobPosition">
                              <option value="" selected>Select Position</option>
                              @foreach($data as $cat)
                              <option value="{{$cat->postid}}">{{ucwords($cat->post)}}</option>
                              @endforeach
                              </select>
                            </div>
                          
                          </div>
                          <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Credential Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="credentialName" placeholder="Category Name">
                            </div>
                          </div>
                          <div class="form-group row">
                    <div class="col-lg-4">
                      <label class="col-form-label">Job description</label>
                    </div>
                    <div class="col-lg-8">
                      <textarea id="maxlength-textarea" class="form-control" name="credentialDescription"  rows="5" placeholder="Enter Credential Description."></textarea>
                    </div>
                  </div>
                          <div class="form-check form-check-flat form-check-primary">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                          </div>
                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                    <div class="col-7">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">List of Credential</h4>
                              <div class="table-responsive">
                                <table id="order-listing" class="table">
                                  <thead>
                                    <tr>
                                      <th>S/N</th>
                                      <th>Credential ID</th>
                                      <th>Position</th>
                                      <th>Credential Name</th>
                                      <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                {{!$sn=1}}
                                {{!$dat = App\credential::all()}}
                                  <tr>
                                  @foreach($dat as $job)
                                      <td>{{$sn++}}</td>
                                      <td>{{$job->cre_id}}</td>
                                      {{!$cat=App\post::where('postid',$job->job_id)->first()}}
                                      <td>{{ucwords($cat->post)}}</td>
                                     <td>{{ucwords($job->c_type)}}</td>
                                      <td>
                                      <a href="deletecredential/{{$job->cre_id}}" title="Delete {{ucwords($cat->c_type)}}">
                                          <h4>
                                          <i class="mdi mdi-delete" style="color:red"></i>
                                          </h4>
                                        </a>
                                      </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
        
								
							</div>
						</div>
					</div>

@endsection