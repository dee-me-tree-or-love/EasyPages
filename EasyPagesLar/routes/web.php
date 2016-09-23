<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// service route managment
Route::get('services', 'ServiceController@index');
Route::get('service/{id}', ['uses' => 'ServiceController@show']);
Route::post('newservice', 'ServiceController@store');


// review route management
Route::get('reviews', 'ReviewController@index');
Route::get('review/{id}', ['uses' => 'ReviewController@show']);

// user related links
Route::get('user/{id}', 'UserController@show');

// profile page link
Route::get('profile/{id}', 'ProfileController@show');
// redirects to a respective profile setup (individual or corporate)
Route::get('newprofile', 'HomeController@afterReg');
Route::post('initprofile', 'ProfileController@store');


// review creation link
Route::post('newreview', 'ReviewController@store');

// company related routes
Route::get('company/{id}', 'CompanyController@show');
Route::post('initcompany', 'CompanyController@store');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::resource('user', 'UserController');
Route::resource('profile', 'ProfileController');
Route::resource('review', 'ReviewController');
Route::resource('service', 'ServiceController');
Route::resource('reviewpicture', 'ReviewPictureController');
Route::resource('servicepicture', 'ServicePictureController');
Route::resource('profilepicture', 'ProfilePictureController');

Auth::routes();

Route::get('/home', 'HomeController@index');
