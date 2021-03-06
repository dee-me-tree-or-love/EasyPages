

@extends('layouts.master')

@section('caption')
SINGLE REVIEW
@endsection


@section('main_content')
<div style="width: 40%; margin: 0 auto; text-align: center">
    
    <div>
        <h1>

            "{{$review->title}}"
            <br/>
            For {{$review->getservice()->title}}
        </h1>
        <h3>
            By {{$review->profile_id}}, {{$review->getprofile()->fname}} {{$review->getprofile()->lname}}
        </h3>

        <p>
            {{$review->description}}
        </p>
        <h4>
            Rating: {{$review->rating}}
        </h4>

        <a href="/service/{{$review->service_id}}">
            Back
        </a>

    </div>

</div>
@endsection


