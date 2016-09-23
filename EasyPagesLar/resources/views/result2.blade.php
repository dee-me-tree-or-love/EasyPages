@extends('layouts.master')

@section('caption')
    WE ARRIVE SOON. AWAIT US.
@endsection

@section('main_content')
<div>
    <h1>Yeah, {{Auth::user()->username}} we still suck.</h1>
    <h2>{{$inputs->name}}</h2>
    <h2>{{$inputs->website}}</h2>
    <h2>{{$inputs->description}}</h2>
    
    <h3 style="max-width: 40vw">{{print_r($inputs)}}</h3>

</div>
@endsection
