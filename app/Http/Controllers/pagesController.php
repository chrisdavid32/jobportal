<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function home(){
        return view('home');
    }
    public function signup(){
        return view('signup');
    }
    public function login(){
        return view('login');
    }
    public function require(){
        return view('require');
    }
    public function apply(){
        return view('applicant.home');
    }
    public function application(){
        return view('applicant.application');
    }
    public function entry(){
        return view('applicant.final');
    }
    public function dash (){
        return view('admin.home');
    }
    public function jobcat (){
        return view('admin.jobcategory');
    }
    public function jobpos (){
        return view('admin.jobpos');
    }
    public function jobcred (){
        return view('admin.credential');
    }
    public function viewp (){
        return view('admin.view');
    }
    public function app (){
        return view('admin.aptitude');
    }
    public function apscreen (){
        return view('admin.screen');
    }
    public function update (){
        return view('admin.appupdate');
    }
    public function appletter (){
        return view('admin.letter');
    }
    public function finalap (){
        return view('applicant.final');
    }
    public function applyr (){
        return view('applicant.report');
    }
    public function pletter (){
        return view('applicant.appointment');
    }
    public function document (){
        return view('admin.document');
    }
    public function  approvedapp (){
        return view('admin.approve');
    }
    public function  aptitudetest (){
        return view('applicant.aptitudetest');
    }
    public function  checkstatus (){
        return view('applicant.checkstatus');
    }
    public function  appointmentletter (){
        return view('applicant.appointmentletter');
    }
    public function  changepassword (){
        return view('applicant.change');
    }
    public function  timer (){
        return view('applicant.timer');
    }
    public function  instruction (){
        return view('applicant.instruction');
    }

}



