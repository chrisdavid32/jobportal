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
            <li class="nav-item">
            <a class="nav-link" href="credential">
            <i class="mdi mdi-pencil menu-icon"></i>
            <span class="menu-title">Job Credential </span>
            </a>
          </li>
         
          <li class="nav-item active">
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
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"></h4>
              <div class="row">
                <div class="col-12">
                @include('applicant.alerts')
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>App No</th>
                            <th>Surname</th>
                            <th>Other Name</th>
                            <th>Gender</th>
                            <th>Post Applied</th>
                            <th>Passport</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      {{!$app=App\applicant::all()}} 
                        <tr>
                        @foreach($app as $infor)
                     <?php $info2 = App\result::where('useremail',$infor->email)->count();
                        $data = App\upload::where('filetype','passport')->where('useremail',$infor->email)->first();
                          if($info2 < 1){ ?>
                          <td>{{$infor->appid}}</td>
                          <td>{{ucwords($infor->last_name)}}</td>
                            <td>{{ucwords($infor->first_name)}},&nbsp;{{ucwords($infor->other_name)}}</td>
                            <td>{{ucwords($infor->gender)}}</td>
                            {{!$dt = App\post::where('postid',$infor->post)->first()}}
                            <td>{{ucwords($dt['post'])}}</td>
                            <td><img src="{{$data->filelocation}}" style="height:60px; width:55px"/></td>
                            <td>
                              <a href="viewdocuments/{{$infor->email}}" target="_blank">
                                <button class="badge badge-info"> 
                                  <i class="mdi mdi-eye"></i>
                                  View Credential
                                </button>
                              </a>
                            </td>
                            <td>
                              <a href="approve/{{$infor->email}}">
                                <button class="badge badge-success"> 
                                  <i class="mdi mdi-check"></i>
                                  Approve 
                                </button>
                              </a>
                            </td>
                          <?php } ?>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        

@endsection