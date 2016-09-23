
@extends('layouts.master')

@section('caption')
SINGLE OVERVIEW
@endsection


@section('main_content')
<div style="width: 40vw; margin: 0 auto; text-align: center">
    <h1>{{$service->title}}</h1>
    <h5>{{$service->description}}</h5>

    <h3>Price: {{$service->price}}</h3>


    <div style="border-bottom: 1px #3097D1 solid; text-align: left;">
        <h4>Your Review:</h4>
    </div>
    @if (Auth::guest())
    <h5><a href="{{ url('/login') }}">Login or register</a> to write a review:</h5>
    @else

        @if(Auth::user()->getprofile() !== null)
            @include('reviews.newreviewform')
        @else
            <h5><i>You can not add a review, being a company member</i></h5>
        @endif
    @endif



    <div style="border-bottom: 1px #3097D1 solid; text-align: left;">
        <h4>Community Reviews</h4>
    </div>

    <!--
    <div>
        {{$reviews}}
    </div>
    -->
    @if(null !== $reviews)
    @include('reviews.reviewlist')
    @else
    <h4>Yet nor reviews..</h4>
    @endif


</div>
@endsection