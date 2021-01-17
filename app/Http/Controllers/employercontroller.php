<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lga;
use App\credential;
use App\signup;
use Session;
use App\applicant;
use App\upload;
use App\result;
use App\appointment;
use App\test;
use Illuminate\Support\Facades\Input;

class employercontroller extends Controller
{
    public function fetchlga(Request $request)
    {
        $statCode = $request->id;
        $data = lga::where('state', $statCode)->orderby('lga', 'ASC')->get();
        return $data;
    }


    public function addImage(Request $request)
    {

        $credentialType = $request->credentialType;
        $file = $request->file;

        //$fileInfo=$file->getClientOriginalName();
        //$ext=$fileInfo['extension'];

        return $file->getClientOriginalName();
    }

    public function newapply(Request $request)
    {
        $this->validate($request, [
            'gender' => 'required',
            'status' => 'required',
            'birth' => 'required',
            'dob' => 'required',
            'state' => 'required',
            'lga' => 'required',
            'homeAddress' => 'required',
            'ParmannentAddress' => 'required',
            'phone' => 'required|numeric',
            'nokName' => 'required',
            'nokAddress' => 'required',
            'relationship' => 'required',
            'nokPhone' => 'required|numeric',
            'passport' => 'required'
        ]);
        //dd($request);
        $tempFilePath = 'passports/';
        $usermail = session()->get('useremail');
        $userData = signup::where('email', $usermail)->first();
        $job_id = $userData->job_id;
        $credCount = credential::where('job_id', $job_id)->count();
        $count = $credCount + 1;
        //$  
        $li = "file1";
        $gt = "";
        for ($sn = 1; $sn < $count; $sn++) {
            $fileName = "file" . $sn;
            $fileInfo = "fileInfo" . $sn;
            $tempFileName = "tempFileName" . $sn;
            $path = "path" . $sn;
            $file = Input::file($fileName);
            if (empty($file)) {
                return redirect('applicant')->with('errorLog', 'Please Upload All Credentials');
            } else {
                $fileInfo = pathinfo(storage_path() . $file->getClientOriginalName());
                $ext = $fileInfo['extension'];
                $usr = str_replace('@', '_', $usermail);
                $tempFileName = str_replace('', '_', $fileName . $usr . '.' . $ext);
                $path = $tempFilePath . $tempFileName;
                $file->move(public_path() . '\/' . $tempFilePath, $tempFileName);
                Session::push('doc', $path);
            }
        }
        $passport = Input::file('passport');
        $passportInfo = pathinfo(storage_path() . $passport->getClientOriginalName());
        $ext = $passportInfo['extension'];
        $tempFileName = str_replace('@', '_', $usermail . '.' . $ext);

        $path2 = $tempFilePath . $tempFileName;
        $passport->move(public_path() . '\/' . $tempFilePath, $tempFileName);
        $applicant = array(
            'gender' => $request->input('gender'),
            'status' => $request->input('status'),
            'birth' => $request->input('birth'),
            'dob' => $request->input('dob'),
            'state' => $request->input('state'),
            'lga' => $request->input('lga'),
            'homeAddress' => $request->input('homeAddress'),
            'ParmannentAddress' => $request->input('ParmannentAddress'),
            'phone' => $request->input('phone'),
            'nokName' => $request->input('nokName'),
            'nokAddress' => $request->input('nokAddress'),
            'relationship' => $request->input('relationship'),
            'nokPhone' => $request->input('nokPhone'),
            'passport' => $path2,
        );


        Session::put('applicatedata', $applicant);

        return redirect('preview');
    }
    public function endApply(Request $request)
    {
        $this->validate($request, [
            'check' => 'required',
        ]);
        $info = Session::get('applicatedata');
        $gender =  $info['gender'];
        $status = $info['status'];
        $birth = $info['birth'];
        $dob = $info['dob'];
        $state = $info['state'];
        $lga = $info['lga'];
        $homeAddress = $info['homeAddress'];
        $ParmannentAddress = $info['ParmannentAddress'];
        $nokName = $info['nokName'];
        $nokAddress = $info['nokAddress'];
        $relationship = $info['relationship'];
        $nokPhone = $info['nokPhone'];
        $passport = $info['passport'];
        $email = Session::get('useremail');
        $userInfo = signup::where('email', $email)->first();
        $first_name = $userInfo['first_name'];
        $last_name = $userInfo['last_name'];
        $other_name = $userInfo['other_name'];
        $phone = $userInfo['phone'];
        $post = $userInfo['job_id'];

        $tfcount = applicant::count();
        $tf = $tfcount + 1;
        $Appid = "APP/ADSU/2020/" . sprintf("%'.05d", $tf);
        $applicants = new applicant;
        $applicants->appid = $Appid;
        $applicants->email = $email;
        $applicants->first_name = $first_name;
        $applicants->last_name = $last_name;
        $applicants->other_name = $other_name;
        $applicants->gender = $gender;
        $applicants->dob = $dob;
        $applicants->birth = $birth;
        $applicants->state     = $state;
        $applicants->lga = $lga;
        $applicants->home = $homeAddress;
        $applicants->p_address = $ParmannentAddress;
        $applicants->phone = $phone;
        $applicants->nok_name     = $nokName;
        $applicants->nok_address = $nokAddress;
        $applicants->nok_phone = $nokPhone;
        $applicants->relation = $relationship;
        $applicants->post = $post;
        $applicants->date = time();
        $applicants->save();


        $pop = new upload;
        $pop->useremail = $email;
        $pop->filetype = "passport";
        $pop->filelocation = $passport;
        $pop->save();

        $docInfo = credential::where('job_id', $post)->get();
        $doccount = credential::where('job_id', $post)->count();

        foreach ($docInfo as $dick) {
            Session::push('filename', $dick->c_type);
        }
        $n = Session::get('filename');
        $f = Session::get('doc');

        for ($i = 0; $i < $doccount; $i++) {
            $pop = new upload;
            $pop->useremail = $email;
            $pop->filetype = $n[$i];
            $pop->filelocation = $f[$i];
            $pop->save();
        }
        Session::forget('applicatedata');
        Session::forget('doc');
        Session::forget('filename');
        return redirect('/applicationreport');
    }

    public function approve(Request $request)
    {
        $email = $request->id;
        if (result::where('useremail', $email)->count() > 0) {
            return redirect('information')->with('errorLog', 'Applicant Approved Already');
        } else {
            $quy = new result;
            $quy->useremail = $email;
            $quy->score = 0;
            $quy->stat = 0;
            $quy->save();
        }
        return redirect('information')->with('stat', $email . ' added to approved list');
    }

    public function unapprove(Request $request)
    {
        $email = $request->id;
        result::where('useremail', $email)->delete();
        return redirect('approvedapplicate')->with('stat', $email . ' removed from approved list');
    }

    public function savetest(Request $request)
    {
        $data = signup::where('email', session()->get('useremail'))->first();
        $td = test::where('categoryid', $data->job_type)->count();
        $questLog = test::where('categoryid', $data->job_type)->get();
        $totalObtainable = $td * 10;
        $sn = 1;
        $score = 0;
        foreach ($questLog as $quest) {
            $qut = 'question' . $quest->id;
            if ($quest->answer === $request->$qut) {
                $score += 1;
            }
        }
        $obtained = $score * 10;
        $percObtained  = (($obtained / $totalObtainable) * 100);
        $stat = 1;

        result::where('useremail', session()->get('useremail'))
            ->update([
                'score' => $percObtained,
                'stat' => $stat
            ]);

        return redirect('starttest');
    }


    public function sendapprove(Request $request)
    {
        $ct = rand(40, 700) * time();
        $appointmentid = "NAC" . sprintf('%0.7s', str_shuffle($ct));
        $useremail = $request->id;

        $userData = signup::where('email', $useremail)->first();
        $category = $userData->job_type;
        $position = $userData->job_id;

        $newDate = date('d D M Y', strtotime('+7days', time()));

        $unixTime = strtotime($newDate);

        $py = new appointment;
        $py->appointmentid = $appointmentid;
        $py->useremail = $useremail;
        $py->category = $category;
        $py->position = $position;
        $py->date = $unixTime;
        $py->save();

        return redirect('screening')->with('stat', ' Appointment Letter  For ' . $useremail . ' generated');
    }
}
