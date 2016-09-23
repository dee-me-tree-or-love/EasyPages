@extends('layouts.master')

@section('caption')
UserReviews
@endsection

@section('main_content')

<div class="container">

    @foreach($reviews as $review)

    <div>


        <div>
            <a href="/service/{{$review->service_id}}">
                <h1>{{$review->service_id}}</h1>
            </a>

            <h4>{{$review->rating}}</h4>
            <p>{{$review->profile_id}}</p>
        </div>


    </div>

    @endforeach
</div>
@endsection
