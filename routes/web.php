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
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');

//Company routes
Route::get('/company/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('/company/create', 'CompanyController@create')->name('company.create');
Route::post ('/company/create', 'CompanyController@store')->name('company.store');
Route::post ('/company/coverphoto', 'CompanyController@coverPhoto')->name('cover.photo');
Route::post ('/company/logo', 'CompanyController@companylogo')->name('company.logo');
Route::get('/companies', 'CompanyController@company')->name('company');

//user profile
Route::get('/user/profile', 'UserProfileController@index');
Route::post('/user/profile/create', 'UserProfileController@store')->name('profile.create');
Route::post('/user/coverletter', 'UserProfileController@coverletter')->name('cover.letter');
Route::post('/user/resume', 'UserProfileController@resume')->name('resume');
Route::post('/user/avatar', 'UserProfileController@avatar')->name('avatar');
Route::view('/employer/register', 'auth.employer-register')->name('employer.register');
Route::post('/employer/register', 'EmployerRegisterController@employerRegister')->name('emp.register');

Route::post('applications/{id}','JobController@apply')->name('apply');


Route::post('/save/{id}', 'FavouriteController@saveJob');
Route::post('/unsave/{id}', 'FavouriteController@unSaveJob');


//Search
Route::get('/jobs/search', 'JobController@searchJobs');


//category jobs
Route::get('/category/{id}/jobs', 'CategoryController@index')->name('category.jobs');

//email
Route::post('/job/mail', 'EmailController@send')->name('mail');

//admin
Route::get('/dashboard', 'DashboardController@index')->middleware('admin');
Route::get('/dashboard/create', 'DashboardController@create')->middleware('admin');

Route::post('/dashboard/create', 'DashboardController@store')->name('post.store')->middleware('admin');
Route::post('/dashboard/destroy', 'DashboardController@destroy')->name('post.delete')->middleware('admin');
Route::get('/dashboard/{id}/edit', 'DashboardController@edit')->name('post.edit')->middleware('admin');
Route::post('/dashboard/{id}/edit', 'DashboardController@update')->name('post.update')->middleware('admin');

Route::get('/dashboard/trash', 'DashboardController@trash')->name('post.trash')->middleware('admin');
Route::get('/dashboard/{id}/trash', 'DashboardController@restore')->name('post.restore')->middleware('admin');
Route::get('/dashboard/{id}/toggle', 'DashboardController@toggle')->name('post.toggle')->middleware('admin');
Route::get('/posts/{id}/{slug}', 'DashboardController@show')->name('post.show');
Route::get('/dashboard/jobs', 'DashboardController@getAllJobs')->middleware('admin');
Route::get('/dashboard/{id}/jobs', 'DashboardController@toggleStatusJob')->name('job.status')->middleware('admin');

//testimonial
Route::get('testimonial', 'TestimonialController@index')->middleware('admin');
Route::get('testimonial/create', 'TestimonialController@create')->middleware('admin');
Route::post('testimonial/create', 'TestimonialController@store')->name('testimonial.store')->middleware('admin');
