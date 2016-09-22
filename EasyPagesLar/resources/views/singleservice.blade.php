
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


    <!-- New Review Form -->
    <h5 style="text-align: right;">{{ Auth::user()->username }}</h5>
    <form id="newreview" action="newreview" method="POST" class="form-horizontal">
        <table style="width: 20vw; margin: auto;">
            <!-- Review Rating -->
            <tr>
            <div class="form-group">
                <td>
                    <label for="review-title" class="control-label">Rating</label>
                </td>
                <td>
                    <div>
                        <input type="number" name="rating" id="rating" min="1" max="10">
                    </div>
                </td>
            </div>
            </tr>

            <!-- Review Title -->
            <tr>
            <div class="form-group">
                <td>
                    <label for="title" class="control-label">Title</label>
                </td>
                <td>
                    <div>
                        <input type="text" name="title" id="title">
                    </div>
                </td>
            </div>
            </tr>
        </table>

        <h5 style="text-align: left;">What do you think?</h5>
        <textarea style="max-height: 10vw; width: 40vw; height: 60pt" name="description" form="newreview"> 
        </textarea>
        <!-- Add Review Button -->
        <div>
            <div>
                <button type="submit" class="btn btn-default">
                    Save
                </button>
            </div>
        </div>
    </form>


    @endif



    <div style="border-bottom: 1px #3097D1 solid; text-align: left;">
        <h4>Community Reviews</h4>
    </div>
    <!--
    <div>
        {{$reviews}}
    </div>
    -->
    @foreach($reviews as $review)
    <div>
        <h3>
            By {{$review->profile_id}}
            , {{$review->getprofile()->fname}} {{$review->getprofile()->lname}}   

        </h3>
        <h4>
            {{$review->title}}
        </h4>
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