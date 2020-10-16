<?php
$data = App\applicant::where('email',session()->get('useremail'))->first();
$data2 = App\state::where('stateid',$data->state)->first();
$appt = App\appointment::where('useremail',session()->get('useremail'))->first();
$post = App\post::where('postid',$appt->position)->first();
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>FPM Staff Recruitment</title>
    
     <!-- end -->

<!--</head-->
</head>
<body  bgcolor="#ffffff" >
<!-- cssss -->
<style type="text/css">
    .style1
    {
        height: 41px;
    }
    .p{
        line-height:35px;
        margin:10px;
    }
</style>	
<table style="width: 503px;border:0.1em solid green" align ="center" >
    <tbody>
        <tr>
            <td colspan="2" style="font-family:Impact; font-size:35px; color:green;"  align ="center" >
                THE FEDERAL POLYTECHNIC, MUBI 
                <b style="font-size:23px; color:red;">OFFICE OF THE REGISTRAR<br>
                <img src="{{ asset('assets/images/resource/log.jpeg') }}" style="height:100px; width:90px;"/>
            </td>
        </tr>
        <tr>
		    <td align="left">
                <p class="p" style="float:left; font-size:15px">
                    Our Ref <i style="font-weight:bolder;">FPM/AC/REG/032</i><br>
                    Your Ref.........................
                </p> 
                <p class="p"  style="float:right; font-size:15px">
                    Date  <i style="font-weight:bolder;">{{date('jS F, Y',time())}}</i>
                </p> 
	        <td>
        </tr> 
        <tr>
            <td>
                <div style=" z-index:100px; display:block; text-decoration:underline; font-size:20px" align="center">
                    <b class="p">LETTER OF PROVISIONAL APPOINTMENT</b>
                </div>
                <b style="margin-left:10px;">
                    {{strtoupper($data->last_name).', '.ucwords($data->first_name).' '.ucwords($data->other_name)}}
                </b><br>
                <b style="margin-left:10px;font-weight:normal;">
                    {{ucwords($data->p_address).','}}
                </b><br>
                <b style="margin-left:10px;font-weight:normal;">
                    {{ucwords($data->lga).','}}
                </b><br>
                <b style="margin-left:10px;font-weight:normal;">
                   {{ucwords($data2->state)}}
                </b><br>
               
            </td>
	    </tr>
        <tr>
            <td>
                <div style="align:justify; font-size:20px; font-type:new time roman ">
                    <p class="p" align="justify">
                        This is to inform you that you have been offered a provincial job in our Institution for 
                        the post of <b><i>{{ucwords($post->post)}}</i></b>., with effect from  <b><i>{{date('jS F, Y', $appt->date)}}</i></b>. On behalf of the staff and management of the above named Institution we say Congratulations on 
                        your new appointment. We wish you a memorable stay with us.
                    </p>
                </div>
            </td>
	    </tr>
        <tr>
            <td>
                <span style=" float:right">
                    <img src="" width ="100" height="30" />
                    <b>For REGISTRAR<b>
                </span>
            </td>
        </tr>
    </tbody>
</table>


</body></html>