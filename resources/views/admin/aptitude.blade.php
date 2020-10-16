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
                <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
                </a>
                <a class="dropdown-item" href="">
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
          <li class="nav-item ">
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
          <li class="nav-item active">
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
            <span class="menu-title">Upload Appointment Letter</span>
            </a>
          </li>
          </ul>
      </nav>
      <div class="main-panel">
					<div class="content-wrapper">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-sm-6 mb-4 mb-xl-0">
										<h3> ADD APTITUDE TEST</h3>
										</div>
								</div>
                @include('applicant.alerts')
                <div class="tab-content tab-transparent-content pb-0">
									<div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
										<div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <form class="forms-sample">
                          <div class="row grid-margin">
                          <div class="col-lg-12">
                          <div class="form-group col-md-3">
                                <label for="exampleSelectGender">Category Types</label>
                                {{!$datas = App\category::orderby('category_name','ASC')->get()}}
                                <select class="form-control" name="category" id="category">
                                <option value="" selected>Select Job Type</option>
                                @foreach($datas as $data)
                                  <option value="{{$data->categoryid}}">{{ucwords($data->category_name)}}</option>
                                  @endforeach
                              </select>
                            </div>
                          <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Type Question</label>
                            <div class="card">
                            <div class="card-body">
                            <h4>Enter questions</h4>
                                <div id="summernoteExample">
                              </div>
                              </div>
                            </div>
                            <br>
                           <h3 class="card-title">Input Options</h3>
                           <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Option A</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="optionA" id="optionA"  placeholder="Enter An Option">
                            </div>
                            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Option B</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="optionB" id="optionB" placeholder="Enter An Option">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Option C</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="optionC" id="optionC" placeholder="Enter An Option">
                            </div>
                            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Option D</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="optionD" id="optionD"  placeholder="Enter An Option">
                            </div>
                          </div>
                          <h3 class="card-title">Enter Answer</h3>
                          <div class="form-group col-md-2">
                                <label for="exampleSelectGender">Answer</label>
                                <select class="form-control" name="answer" id="answer">
                                <option value="" selected>Select Answer</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                </select>
                            </div>
                            <br>
                          <div class="form-check form-check-flat form-check-primary">
                            <button type="submit" class="btn btn-primary mr-2" id="submit">Submit</button>
                            <button class="btn btn-light">Clear</button>
                            </div>
                        </div>
                      </div>
                    </div>
                    
                   
        	
							</div>
						</div>
					</div>
      <script src="{{ asset('js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<script>
  $('#submit').on('click', function(){
    //var question = $("#summernoteExample").summernote("code", "your text");
    var question = $('#summernoteExample').summernote('code');
    //alert(markupStr);
    var category=$("#category").val();
    var optionA=$("#optionA").val();
    var optionB=$("#optionB").val();
    var optionC=$("#optionC").val();
    var optionD=$("#optionD").val();
    var answer=$("#answer").val();
    //alert(answer);
    event.preventDefault();
      $.ajax({
        type:'GET',
        url:'test',
        data:{
          category: category,
          question: question,
          optionA: optionA,
          optionB: optionB,
          optionC: optionC,
          optionD: optionD,
          answer: answer
        },
        success: function (data){
         alert(JSON.stringify(data));
        }
      });
  });
  
   
  
</script>

@endsection