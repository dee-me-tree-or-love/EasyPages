@foreach($services as $service)

<div style='display: flex;'>
    <div>
        <h1>
            <a href="/service/{{$service->service_id}}">
                {{$service->title}}
            </a>
        </h1>

        <h4>{{$service->price}}</h4>
        <p>{{$service->ShortDescription()}}</p>
    </div>
    <div>
        <form method='POST' action='{{ url('/deleteservice') }}'>
            <input type='hidden' name='service_id' value='{{$service->service_id}}'>
            {{ csrf_field() }}
            <input type='hidden' name='_method' value='DELETE'>
            <button type='submit' class="btn btn-default">
                DELETE
            </button>
        </form>
    </div>

</div>

@endforeach