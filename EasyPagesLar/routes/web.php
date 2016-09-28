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

Route::group(['prefix' => 'api/eplar'], function() {
    Route::resource('users', 'UserController');
    Route::resource('profiles', 'ProfileController');
    Route::resource('reviews', 'ReviewController');
    Route::resource('services', 'ServiceController');
    Route::resource('reviewpictures', 'ReviewPictureController');
    Route::resource('servicepictures', 'ServicePictureController');
    Route::resource('profilepictures', 'ProfilePictureController');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

