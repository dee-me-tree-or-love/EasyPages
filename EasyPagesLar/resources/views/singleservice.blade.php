
@extends('layouts.master')

@section('caption')
SINGLE OVERVIEW
@endsection


@section('main_content')
<div style="width: 40%; margin: 0 auto; text-align: center">
    <h1>{{$service->title}}</h1>
    <h5>{{$service->description}}</h5>
    <h3>{{$service->price}}</h3>
    <!--
    <div>
        {{$reviews}}
    </div>
    -->
    @foreach($reviews as $review)
    <div>
        <h3>
            By {{$review->profile_id}}, {{$review->getprofile()->fname}} {{$review->getprofile()->lname}}
        </h3>
        <p>
            {{$review->ShortDescription(35)}}
            <br/>
            <span class="links">
                <a href="/review/{{$review->review_id}}">Read More</a>
            </span>
        </p>
        <h4>
            Rating: {{$review->rating}}
        </h4>

    </div>
    @endforeach

</div>
@endsection