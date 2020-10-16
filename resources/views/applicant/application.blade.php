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
    {{!$ct = App\signup::where('email',session()->get('useremail'))->first()}}
    {{!$categoryid=$ct->job_type}}
    {{!$postid=$ct->job_id}}
	@endif

  {{!$ctCount=App\applicant::where('email',session()->get('useremail'))->count()}}
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
          
          
          <li class="nav-item active">
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
          @if($ctCount > 0)
            <script>
            window.location="applicationreport";
            </script>
          @else 
          
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Complete Your Application</h4>
                  @include('applicant.alerts')
                          {!! Form::open(['url'=>'newapply', 'files'=>true]) !!}
                    <div >
                      <h3>Biodata</h3>
                      <section>
                       <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleSelectGender">Gender</label>
                                <select class="form-control" name="gender" id="gender">
                                <option value="" selected>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleSelectGender">Marital Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="" selected>Select Marital Status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Place of Birth</label>
                                <input type="text" class="form-control" name="birth" id="birth" placeholder="Place of Birth">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control"name="dob" id="dob" placeholder="Date of Birth">
                            </div>
                        </div>
                        <div class="row">
                                <div class="form-group col-md-6">
                                <label for="exampleSelectGender">State of Origin</label>
                                {{!$datas = App\state::orderby('state','ASC')->get()}}
                                <select class="form-control" name="state" id="state" onchange="getlga();">
                                <option value="" selected>Select State</option>
                                @foreach($datas as $data)
                                  <option value="{{$data->stateid}}">{{ucwords($data->state)}}</option>
                                  @endforeach
                                </select>
                            </div>
                                <div class="form-group col-md-6">
                                <label for="exampleSelectGender">LGA</label>
                                <select class="form-control lga" name="lga" id="lga">
                                  <option value="" selected>Select LGA</option>
                                </select>
                                
                            </div>
                        </div>

                      </section>
                      <h3>Contact</h3>
                      <section>
                        <div class="form-group col-md-8">
                          <label>Home Address</label>
                          <input type="text" class="form-control" name="homeAddress" id="homeAddress" placeholder="Home Address">
                        </div>
                        <div class="form-group col-md-8">
                          <label>Parmanent Address</label>
                          <input type="text" class="form-control" name="ParmannentAddress" id="ParmannentAddress" placeholder="Parmannent Address">
                        </div>
                        <div class="form-group col-md-8">
                          <label>Phone</label>
                          <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                        </div>
                        
                      </section>
                      <h3>Next of Kin Info</h3>
                      <section>
                      <div class="row">
                            <div class="form-group col-md-6">
                          <label>Name</label>
                          <input type="text" class="form-control" name="nokName" id="nokName" placeholder="Full Name">
                        </div>
                        <div class="form-group col-md-6">
                          <label>Address</label>
                          <input type="text" class="form-control" name="nokAddress" id="nokAddress" placeholder=" Address">
                        </div>
                        <div class="form-group col-md-6">
                                <label for="exampleSelectGender">Relationship</label>
                                <select class="form-control" name="relationship" id="relationship">
                                <option value="" selected>Select Relationship</option>
                                    <option>Brother</option>
                                    <option>Sister</option>
                                    <option>Father</option>
                                    <option>mother</option>
                                </select>
                            
                            </div>
                            <div class="form-group col-md-7">
                                <label for="exampleInputName1">Phone</label>
                                <input type="text" class="form-control" name="nokPhone" id="nokPhone" placeholder="Phone Number">
                            </div>
                        
                      </section>
                      <h3>Upload</h3>
                      <section>
                      <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleSelectGender">Upload Passport</label>
                                <input name="passport" id="passport" type="file" onchange="uploadpass();" />
                            </div>
                            {{!$sn=1}}
                          {{!$creds = App\credential::where('job_id',$postid)->get()}}
                                @foreach($creds as $dick)
                            <div class="form-group col-md-6">
                                <label for="exampleSelectGender">Upload {{ucwords($dick->c_type)}}</label>
                                <input name="file{{$sn++}}" type="file" />
                            </div>
                                @endforeach
                        </div>
                       </section>
                    <button class="btn btn-success">
                      <i class="mdi mdi-check"></i> Finish</button>
                    </div>
                    </div>
                          {!! Form::close() !!}
              </div>
            </div>
          </div>
          
       <style>
       .cg{
         color: red;
         font-weight:bolder;
       }
       </style>
        </div>
          @endif
      <script src="{{ asset('js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
       <script>
          function getlga(){
            var state = $("#state").val();
            //alert(state);
            event.preventDefault();
              $.ajax({
                type:'GET',
                url:'fetchlga/'+state,
                processData:false,
                contentType:false,
                beforeSend: function(){
                  $('#lga')
                  .empty()
                  .append('<option value="" selected>Select LGA</option>')
                },
                success: function (data){

                $.each(data, function(key,value){
                  $('#lga')
                  .append($('<option></option>')
                  .attr('value', value['lga'])
                  .text(value['lga']));
                });
                }
              });
          };

          function fetchcredential(){
            var post = $("#post").val();
            //alert(state);
            event.preventDefault();
              $.ajax({
                type:'GET',
                url:'fetchcredential/'+post,
                processData:false,
                contentType:false,
                beforeSend: function(){
                  $('#credentialType')
                  .empty()
                  .append('<option value="" selected>Select credential Type</option>')
                },
                success: function (data){

                $.each(data, function(key,value){
                  $('#credentialType')
                  .append($('<option></option>')
                  .attr('value', value['c_type'])
                  .text(value['c_type']));
                });
                }
              });
          };

          function pussy(){
            var post = $("#credentialType").val();
            document.getElementById('upload').style.display="block";
            $(".dick").addClass('cg');
            $(".dick").html(post);
            //alert(post);
          };

          

         
          
       </script>
@endsection