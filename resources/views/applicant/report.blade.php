{{!$data = App\upload::where('useremail',session()->get('useremail'))->where('filetype','passport')->first()}}
{{!$userInfo= App\applicant::where('email',session()->get('useremail'))->first()}}
{{!$cats= App\signup::where('email',session()->get('useremail'))->first()}}
{{!$user= App\signup::where('email',session()->get('useremail'))->first()}}
		<link rel="stylesheet" href="{{ asset('external/vendors/mdi/css/materialdesignicons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('external/css/style.css') }}">
<style>
img{
    width:150px;
    height:150px;
}
table {
    border: 0.02em solid #0000ff;
    width:80%;
}
.head{
    border: 0.02em solid #0000ff;
    font-weight:bolder;
    font-size:24px;
    margin-top:5px;
}
.body{
    border: 0.01em solid #ff0000;
    font-weight:bolder;
    font-size:16px;
    text-align:left;
    width:30%;
    line-height:35px;

}
.body2{
    border: 0.01em solid #ff0000;
    font-weight:bold;
    font-size:20px;
    text-align:left;

}
h2,h3,h4,h5,h6{
     text-align:middle;
    margin-top:10px;
}
#h1{
		font-size:47px;
		font-weight:bold;
		color:blue;
	}
	#h2{
		font-size:30px;
		font-weight:bold;
		color:red;
	}
	#h3{
		font-size:25px;
		font-weight:bold;
		color:black;
	}
	#me{
		height:150px;
		display:inline-block; 
		text-align:center;
		width:70%;
		vertical-align:middle;
	}
@media print{
	#me{
		height:150px;
		display:inline-block; 
		text-align:center;
		width:60%;
		vertical-align:middle;
	}
#h1{
		font-size:32px;
		font-weight:bold;
		color:blue;
	}
	.btn{
		display:none;
	}
	
}
</style>
<table align="center">
	<tr>
		<td colspan="3">
			<img src="{{ asset('log.jpeg') }}">
           <div id="me" >
		   <font id="h1">
            FPM STAFF RECRUITMENT
			</font><br>
			<font id="h2">
			Mubi, Adamawa State
			</font><br>
			<font id="h3">
			Application Form Print-Out
			</font>
			</div>
			<img src="{{$data->filelocation}}" style="display:inline">
            </td>
        </tr>


	<tr>
		<td  colspan="3" class="head">
			<h4>Application Detail</h4>
            </td>
	</tr>


	<tr>
		<td  class="body">
			Application Number
		</td>
		<td colspan="2" class="body2">
		{{$userInfo->appid}}	
		</td>
		<td>
        
		</td>
	</tr>

	<tr>
		<td   class="body">
			Post applied
		</td>
		<td colspan="2" class="body2">
        {{!$jobInfo = App\post::where('postid',$user->job_id)->first()}}
        {{ucwords($jobInfo->post)}}
		</td>
	</tr>

	<tr>
		<td  class="body">
			Job Category
		</td>
		<td colspan="2" class="body2">
        {{!$jobInfo = App\category::where('categoryid',$user->job_type)->first()}}
		{{ucwords($jobInfo->category_name)}}	
		</td>
	</tr>

	<tr>
		<td  class="body">
			Date of Application
		</td>
		<td colspan="2" class="body2">
		{{date('jS F, Y', $userInfo->date)}}	
		</td>
	</tr>

	<tr>
		<td  colspan="3" class="head">
			<h4>Persoal Information</h4>
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  colspan="3" class="head">
			<h5>Biodata</h5>
            </td>
	</tr>

	<tr>
		<td  class="body">
			Surname
		</td>
		<td colspan="2" class="body2">
		{{ucwords($userInfo->first_name)}}	
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  class="body">
			Other Name
		</td>
		<td colspan="2" class="body2">
        {{ucwords($userInfo->last_name)}},{{ucwords($userInfo->other_name)}}	
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  class="body">
			Gender
		</td>
		<td colspan="2" class="body2">
        {{ucwords($userInfo->gender)}}
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  class="body">
			Date of Birth
		</td>
		<td colspan="2" class="body2">
        {{$userInfo->dob}}
		</td>
		<td>
       
		</td>
	</tr>

	<tr>
		<td  class="body">
			Place of Birth
		</td>
		<td colspan="2" class="body2">
        {{ucwords($userInfo-> birth)}}
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  class="body">
        {{!$st = App\state :: where('stateid',$userInfo->state)->first()}}
			State of Origin
		</td>
		<td colspan="2" class="body2">
        {{ucwords($st-> state)}}
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  class="body">
			L G A
		</td>
		<td colspan="2" class="body2">
		{{ucwords($userInfo-> lga)}}	
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  colspan="3" class="head">
			<h5>Contact Information</h5>
		</td>
	</tr>

	<tr>
		<td  class="body">
			Home Address
		</td>
		<td colspan="2" class="body2">
        {{ucwords($userInfo-> home)}}
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  class="body">
			Parmanent Address
		</td>
		<td colspan="2" class="body2">
		{{ucwords($userInfo-> p_address)}}	
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  class="body">
			E-mail 
		</td>
		<td colspan="2" class="body2">
        {{$userInfo-> email}}	
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  class="body">
			Phone Number
		</td>
		<td colspan="2" class="body2">
        {{ucwords($userInfo-> phone)}}
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  colspan="3" class="head">
			<h5>Next of Kin Information</h5>
		</td>
	</tr>

	<tr>
		<td  class="body">
			Next of Kin Name
		</td>
		<td colspan="2" class="body2">
        {{ucwords($userInfo-> nok_name)}}
			
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  class="body">
			Next of Kin Address
		</td>
		<td colspan="2" class="body2">
        {{ucwords($userInfo-> nok_address)}}	
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  class="body">
			Next of Kin Phone
		</td>
		<td colspan="2" class="body2">
        {{ucwords($userInfo-> nok_phone)}}
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  class="body">
			Relationship
		</td>
		<td colspan="2" class="body2">
        {{ucwords($userInfo-> relation)}}
		</td>
		<td>
			
		</td>
	</tr>

	<tr>
		<td  colspan="3" class="head">
			<h5>Declaration</h5>
		</td>
	</tr>

	<tr>
		<td  class="body"  colspan="3" >
			<p align="justify">I&nbsp;<b>{{ucwords($userInfo->last_name)}}&nbsp;{{ucwords($userInfo->first_name)}}&nbsp;{{ucwords($userInfo->other_name)}}</b> comfirm that the information given are to the best<br> 
			of my knowledge and i will abide b the institution code for Employment. </p>
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
	</tr><tr>
		<td  class="head"  colspan="3" >
			<center>
				<button onclick="print()" class="btn btn-primary">
				<i class="mdi mdi-printer"></i> Print
				</button>
			</center>
		</td>
	</tr>
</table>