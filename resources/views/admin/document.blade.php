{{!$email=Request::route('id')}}

{{!$data=App\upload::where('useremail',$email)->where('filetype','!=','passport')->get()}}
@foreach($data as $info)
    <img src="{{Config::get('constants.options.sitelink').$info->filelocation}}" width="400px" height="500px"/>
 @endforeach