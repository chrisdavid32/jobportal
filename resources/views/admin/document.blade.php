{{!$email=Request::route('id')}}

{{!$data=App\upload::where('useremail',$email)->where('filetype','!=','passport')->get()}}
@foreach($data as $info)
    <img src="{{Config::get('constants.options.sitelink').$info->filelocation}}" width="600px" height="700px"/>
 @endforeach