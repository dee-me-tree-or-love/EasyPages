

@extends('layouts.master')

@section('caption')
SINGLE OVERVIEW
@endsection


@section('main_content')
<div style="width: 40%; margin: 0 auto; text-align: center">
    <h1>{{$service->title}}</h1>
    <h5>{{$service->description}}</h5>
    <h3>For: {{$service->price}}</h3>
</div>
@endsection