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
// |+ ,  'middleware' => 'auth'  +| -- add after prefix if needed
Route::group(['prefix' => 'api/eplar', 'middleware' => 'cors'], function() {
	
	// the JWT authentication routes
	Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');    
    Route::post('registration', 'AuthenticateController@register');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
	// our routes
    Route::resource('users', 'UserController');
    Route::resource('companies', 'CompanyController');
    Route::resource('profiles', 'ProfileController');
    Route::resource('reviews', 'ReviewController');
    Route::resource('services', 'ServiceController');
    Route::resource('reviewpictures', 'ReviewPictureController');
    Route::resource('servicepictures', 'ServicePictureController');
    Route::resource('profilepictures', 'ProfilePictureController');
    //Delete or create review
    Route::delete('review/{id}/delete', 'ReviewController@destroy');
    Route::post('newreview', 'ReviewController@store');
    Route::post('review/{id}/update', 'ReviewController@update');
    //Get profile with user id
    Route::get('profile/{id}', 'ProfileController@show');
    //Create service
    Route::post('newservice', 'ServiceController@store'); //should check if a company
    Route::delete('service/{id}/delete', 'ServiceController@destroy');
    Route::post('service/{id}/update', 'ServiceController@update');
    //Create profile or company
    Route::post('initprofile', 'ProfileController@store'); 
    Route::post('initcompany', 'CompanyController@store'); //should check if a company
    //Find company
    Route::get('company/user/{id}', 'CompanyController@findbyuser'); 
    

});



Auth::routes();
Route::get('/home', 'HomeController@index');



///// redundant shit
//// profile page link
//// redirects to a respective profile setup (individual or corporate)
//Route::get('newprofile', 'HomeController@afterReg');
//Route::post('updateprofile', 'ProfileController@update');
//// company related routes
//Route::post('updatecompany', 'CompanyController@update'); //should check if a company
//// service route managment
//Route::get('services', 'ServiceController@index');
//Route::get('service/{id}', ['uses' => 'ServiceController@show']);
//Route::delete('deleteservice', 'ServiceController@destroy');
//// review route management
//Route::get('review/{id}', ['uses' => 'ReviewController@show']);