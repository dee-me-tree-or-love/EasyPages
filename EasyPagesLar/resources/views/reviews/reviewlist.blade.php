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