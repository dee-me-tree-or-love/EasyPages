@foreach($reviews as $review)

<div style='display: flex;'>
    <div>
        <h1>
            <a href="/review/{{$review->review_id}}">
                {{$review->title}}
            </a>
        </h1>

        <p>{{$review->description}}</p>
    </div>
    <div>
        <form method='POST' action='{{ url('/deletereview') }}'>
            <input type='hidden' name='review_id' value='{{$review->review_id}}'>
            {{ csrf_field() }}
            <input type='hidden' name='_method' value='DELETE'>
            <button type='submit' class="btn btn-default">
                DELETE
            </button>
        </form>
    </div>

</div>

@endforeach