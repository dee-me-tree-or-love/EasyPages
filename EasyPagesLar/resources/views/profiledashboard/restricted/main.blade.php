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
        {{$profile->fname}} {{$profile->lname}}
    @endsection

    @section('main_content')
    <div>
        <h1>Here we will have the overview of this profile's activity</h1>
    </div>
    @endsection
@endif