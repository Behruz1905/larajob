<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'JobController@index');
Route::get('/jobs/create','JobController@create')->name('job.create');
Route::post('/jobs/create','JobController@store')->name('job.store');
Route::get('/jobs/my-job','JobController@myJob')->name('jobs.myjob');
Route::get('/jobs/{id}/edit','JobController@edit')->name('job.edit');
Route::post('/jobs/{id}/edit','JobController@update')->name('job.update');
Route::get('/jobs/applications','JobController@applicant')->name('applicants');
Route::get('/jobs/alljobs','JobController@allJobs')->name('alljobs');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');

//Company routes
Route::get('/company/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('/company/create', 'CompanyController@create')->name('company.create');
Route::post ('/company/create', 'CompanyController@store')->name('company.store');
Route::post ('/company/coverphoto', 'CompanyController@coverPhoto')->name('cover.photo');
Route::post ('/company/logo', 'CompanyController@companylogo')->name('company.logo');

//user profile
Route::get('/user/profile', 'UserProfileController@index');
Route::post('/user/profile/create', 'UserProfileController@store')->name('profile.create');
Route::post('/user/coverletter', 'UserProfileController@coverletter')->name('cover.letter');
Route::post('/user/resume', 'UserProfileController@resume')->name('resume');
Route::post('/user/avatar', 'UserProfileController@avatar')->name('avatar');
Route::view('/employer/register', 'auth.employer-register')->name('employer.register');
Route::post('/employer/register', 'EmployerRegisterController@employerRegister')->name('emp.register');

Route::post('applications/{id}','JobController@apply')->name('apply');

