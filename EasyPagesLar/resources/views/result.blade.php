@extends('layouts.master')

@section('caption')
    WE ARRIVE SOON. AWAIT US.
@endsection

@section('main_content')
<div>
    <h1>Yeah, {{Auth::user()->username}} we still suck.</h1>
    @foreach($inputs as $input)
    <p>$input-></p>
    @endforeach
    
    <h3 style="max-width: 40vw">{{print_r($inputs)}}</h3>

</div>
@endsection
