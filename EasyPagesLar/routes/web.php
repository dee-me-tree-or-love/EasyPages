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


Route::get('services', 'ServiceController@index');


Route::get('reviews', 'ReviewController@index');

Route::get('service/{id}', ['uses' => 'ServiceController@show']);


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

