@extends('layouts.master')
@if(Auth::guest())
    @section('caption')
        WHY ARE YOU EVEN HERE?!
    @endsection
    
    @section('main_content')
    <div>
        <h1>Please, leave immediately.</h1>
    </div>
    @endsection
    
@else
    @section('caption')
        HELLO, {{Auth::user()->getprofile()->fname}}
    @endsection

    @section('main_content')
    <div>
        <h1>We are trying to figure out what to add.</h1>
    </div>
    @endsection
@endif