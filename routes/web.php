<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
   // return view('welcome');
//});

Route::get('/', 'pagesController@home');
Route::get('registration/{id}', 'pagesController@signup');
Route::get('login', 'pagesController@login');
Route::get('requirement', 'pagesController@require');
Route::get('dashboard', 'pagesController@apply');
Route::get('applicant', 'pagesController@application');
Route::get('dataentry', 'pagesController@entry');
Route::get('admin', 'pagesController@dash');
Route::get('job', 'pagesController@jobcat');
Route::get('position', 'pagesController@jobpos');
Route::get('credential', 'pagesController@jobcred');
Route::get('information', 'pagesController@viewp');
Route::get('question', 'pagesController@app');
Route::get('screening', 'pagesController@apscreen');
Route::get('status', 'pagesController@update');
Route::get('appointment', 'pagesController@appletter');
Route::get('preview', 'pagesController@finalap');
Route::get('printletter', 'pagesController@pletter');
Route::get('viewdocuments/{id}', 'pagesController@document');
Route::get('approve/{id}', 'employercontroller@approve');
Route::get('unapprove/{id}', 'employercontroller@unapprove');
Route::get('approvedapplicate', 'pagesController@approvedapp');
Route::get('aptitudetest', 'pagesController@aptitudetest');
Route::get('checkstatus', 'pagesController@checkstatus');
Route::get('appointmentletter', 'pagesController@appointmentletter');
Route::get('timer', 'pagesController@timer');
Route::get('starttest', 'pagesController@instruction');



Route::post('signup', 'signupController@newuser');
Route::post('signin', 'signupController@signin');
Route::get('logout', 'signupController@logout');
Route::post('jobcart', 'signupController@jobcart');
Route::post('jobpost', 'signupController@jobpost');
Route::post('cred', 'signupController@cred');
Route::get('test', 'signupController@test');
Route::post('endApply', 'employercontroller@endApply');
Route::get('applicationreport', 'pagesController@applyr');

Route::post('newapply', 'employercontroller@newapply');
Route::get('deletecategory/{id}', 'signupController@deletecategory');
Route::get('deleteposition/{id}', 'signupController@deleteposition');
Route::get('deletecredential/{id}', 'signupController@deletecredential');

Route::get('fetchlga/{id}', 'employercontroller@fetchlga');
Route::post('addImage', 'employercontroller@addImage');
Route::post('savetest', 'employercontroller@savetest');
Route::get('sendapprove/{id}', 'employercontroller@sendapprove');
 
