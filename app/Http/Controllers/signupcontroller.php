<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\signup;
use App\login;
use Session;
use App\category;
use App\post;
use App\credential;
use App\test;

class signupcontroller extends Controller
{
    public function newuser(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'otherName' => 'required',
            'category' => 'required',
            'position' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);

        if (signup::where('phone', $request->input('phone'))->count() > 0) {
            return redirect('registration/' . $request->input('category'))->with('errorLog', 'Phone Number Already Used');
        } elseif (signup::where('email', $request->input('email'))->count() > 0) {
            return redirect('registration/' . $request->input('category'))->with('errorLog', 'Email Already Used');
        } else {
            if ($request->input('password') !== $request->input('confirm_password')) {
                return redirect('registration/' . $request->input('category'))->with('errorLog', 'Password mismatched');
            } else {

                $pus = new signup;
                $pus->first_name = $request->input('firstName');
                $pus->last_name = $request->input('lastName');
                $pus->other_name = $request->input('otherName');
                $pus->job_type = $request->input('category');
                $pus->job_id = $request->input('position');
                $pus->phone = $request->input('phone');
                $pus->email = $request->input('email');
                $pus->save();

                $pus2 = new login;
                $pus2->email = $request->input('email');
                $pus2->password = $request->input('confirm_password');
                $pus2->role = "2";
                $pus2->page = "dashboard";
                $pus2->stat = "1";
                $pus2->save();

                return redirect('login/')->with('stat', 'Account Created! <br/> Kindly Login to continue');
            }
        }
    }


    public function signin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (login::where('email', $request->input('email'))
            ->where('password', $request->input('password'))
            ->count() > 0
        ) {
            $loginCredentials = login::where('email', $request->input('email'))
                ->where('password', $request->input('password'))
                ->first();
            $stat = $loginCredentials->stat;
            $page = $loginCredentials->page;
            $role = $loginCredentials->role;
            if ($stat > 0) {
                Session::put('useremail', $request->input('email'));
                Session::put('role', $role);
                return redirect($page);
            } else {
                return redirect('login')->with('errorLog', 'Account Deactivated! Contact Admin');
            }
        } else {
            return redirect('login')->with('errorLog', 'Invalid Login Credentials');
        }
    }

    public function logout()
    {
        Session::flush();
        //return Session::get('useremail');
        return redirect('/');
    }



    public function jobcart(Request $request)
    {
        $this->validate($request, [
            'categoryName' => 'required',
            'categoryDescription' => 'required'
        ]);
        if (category::where('category_name', $request->input('categoryName'))->count() > 0) {
            return redirect('job')->with('errorLog', 'Category Name already exist');
        } else {
            $ct = rand(40, 4000) * time();
            $categoryid = "CT" . sprintf('%0.8s', str_shuffle($ct));
            $pus = new category;
            $pus->categoryid = $categoryid;
            $pus->category_name = $request->input('categoryName');
            $pus->catDes = $request->input('categoryDescription');
            $pus->save();
            return redirect('job')->with('stat', $request->input('categoryName') . ' Added Successfully');
        }
    }

    public function deletecategory(Request $request)
    {
        $categoryid = $request->id;
        $data = category::where('categoryid', $categoryid)->first();
        category::where('categoryid', $categoryid)->delete();
        post::where('cartid', $categoryid)->delete();
        return redirect('job')->with('stat', $data->category_name . ' Deleted Successfully');
    }
    public function jobpost(Request $request)
    {
        $this->validate($request, [
            'jobCategory' => 'required',
            'positions' => 'required',
            'positionDescription' => 'required'
        ]);
        if (post::where('post', $request->input('positions'))->where('cartid', $request->input('jobCategory'))->count() > 0) {
            return redirect('position')->with('errorLog', 'Position Name already exist');
        } else {
            $ct = rand(40, 4000) * time();
            $categoryid = "PT" . sprintf('%0.8s', str_shuffle($ct));
            $pos = new post;
            $pos->cartid = $request->input('jobCategory');
            $pos->postid = $categoryid;
            $pos->post = ucwords($request->input('positions'));
            $pos->jobDes = $request->input('positionDescription');
            $pos->save();
            return redirect('position')->with('stat', ucwords($request->input('positions')) . ' Added Successfully');
        }
    }
    public function deleteposition(Request $request)
    {
        $postid = $request->id;
        $job = post::where('postid', $postid)->first();
        post::where('postid', $postid)->delete();
        credential::where('job_id', $postid)->delete();
        return redirect('position')->with('stat', $job->post . ' Deleted Successfully');
    }

    public function cred(Request $request)
    {
        $this->validate($request, [
            'jobPosition' => 'required',
            'credentialName' => 'required',
            'credentialDescription' => 'required'
        ]);
        if (credential::where('C_type', $request->input('credentialName'))->where('job_id', $request->input('jobPosition'))->count() > 0) {
            return redirect('credential')->with('errorLog', 'credential Name already exist');
        } else {
            $ct = rand(40, 4000) * time();
            $categoryid = "CR" . sprintf('%0.8s', str_shuffle($ct));
            $pos = new credential;
            $pos->job_id = $request->input('jobPosition');
            $pos->cre_id = $categoryid;
            $pos->c_type = ucwords($request->input('credentialName'));
            $pos->des = $request->input('credentialDescription');
            $pos->save();
            return redirect('credential')->with('stat', ucwords($request->input('credentialName')) . ' Added Successfully');
        }
    }
    public function deletecredential(Request $request)
    {
        $cre_id = $request->id;
        $cres = credential::where('cre_id', $cre_id)->first();
        credential::where('cre_id', $cre_id)->delete();
        return redirect('credential')->with('stat', $cres->c_type . ' Deleted Successfully');
    }
    public function test(Request $request)
    {
        $question = $request->question;
        $category = $request->category;
        $optionA = $request->optionA;
        $optionB = $request->optionB;
        $optionC = $request->optionC;
        $optionD = $request->optionD;
        $answer = $request->answer;
        if (empty($category)) {
            return "select the category";
        } elseif (empty($question)) {
            return "question is empty";
        } elseif (empty($optionA)) {
            return "option A is empty";
        } elseif (empty($optionB)) {
            return "option B is empty";
        } elseif (empty($optionC)) {
            return "option c is empty";
        } elseif (empty($optionD)) {
            return "option D is empty";
        } elseif (empty($answer)) {
            return "select the correct answer";
        } else {
            $ct = rand(40, 4000) * time();
            $questionid = "QT" . sprintf('%0.6s', str_shuffle($ct));
            $pos = new test;
            $pos->questionid = $questionid;
            $pos->categoryid = $category;
            $pos->question =  $question;
            $pos->option_a = $optionA;
            $pos->option_b = $optionB;
            $pos->option_c = $optionC;
            $pos->option_d = $optionD;
            $pos->answer = $answer;
            $pos->save();
            return  " question added successfully";
        }
    }
}
