@extends('layouts.master')

@section('caption')
    WE ARRIVE SOON. AWAIT US.
@endsection

@section('main_content')
<div>
    <h1>Yeah, {{Auth::user()->username}} we still suck.</h1>
    <h1>{{$input}} you do as well</h1>
</div>
@endsection
