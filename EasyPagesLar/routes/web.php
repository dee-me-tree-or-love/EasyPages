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


//Interesting example of a middleware use
//Route::get('user/{id}', 'UserController@show')
//        ->middleware('checkUser'); //should check if is the same person, if not redirect to company/id or profile/id
//        //
//        //


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
//, 'middleware' => 'auth' -- add after prefix if needed
Route::group(['prefix' => 'api/eplar' ], function() {
    Route::resource('users', 'UserController');
    Route::resource('company', 'CompanyController');
    Route::resource('profiles', 'ProfileController');
    Route::resource('reviews', 'ReviewController');
    Route::resource('services', 'ServiceController');
    Route::resource('reviewpictures', 'ReviewPictureController');
    Route::resource('servicepictures', 'ServicePictureController');
    Route::resource('profilepictures', 'ProfilePictureController');
});

Auth::routes();

Route::get('/home', 'HomeController@index');



///// redundant shit
//// profile page link
//Route::get('profile/{id}', 'ProfileController@show');
//// redirects to a respective profile setup (individual or corporate)
//Route::get('newprofile', 'HomeController@afterReg');
//Route::post('initprofile', 'ProfileController@store'); 
//Route::post('updateprofile', 'ProfileController@update');
//// review creation link
//Route::post('newreview', 'ReviewController@store');
//// company related routes
//Route::get('company/{id}', 'CompanyController@show'); 
//Route::post('initcompany', 'CompanyController@store'); //should check if a company
//Route::post('updatecompany', 'CompanyController@update'); //should check if a company
//// service route managment
//Route::get('services', 'ServiceController@index');
//Route::get('service/{id}', ['uses' => 'ServiceController@show']);
//Route::post('newservice', 'ServiceController@store'); //should check if a company
//Route::delete('deleteservice', 'ServiceController@destroy');
//// review route management
//Route::get('reviews', 'ReviewController@index'); 
//Route::get('review/{id}', ['uses' => 'ReviewController@show']);
//Route::delete('deletereview', 'ReviewController@destroy');
//// user related links