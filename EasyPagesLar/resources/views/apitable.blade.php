@extends('layouts.master')

@section('caption')
    API TABLE
@endsection

@section('main_content')
<div style="text-align: center;">
    <h1>Hi</h1><br/>
    <h5><i>Here we could add all the api routes, <b>but</b></i></h5>
    <br/>
	<h5>we are really lazy and will not do it now.</h5>
    <h5>If you want the proof - here's the link for all the services: </h5>
    <a href="{{ url('/api/eplar/services') }}">../api/eplar/services</a>
    <br>
    <h5>Send us an email, if you woul like some more any time soon.</h5>
</div>
@endsection
