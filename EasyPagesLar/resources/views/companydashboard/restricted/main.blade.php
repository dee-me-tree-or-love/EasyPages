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
        {{$company->name}} 
        <h4><a href="{{$company->website}}">{{$company->website}}</a></h4>
    @endsection

    @section('main_content')
    <div>
        <h1><i>"{{$company->description}}"</i></h1>
        <h3>Here we will have the overview of this profile's activity</h3>
    </div>
    @endsection
@endif