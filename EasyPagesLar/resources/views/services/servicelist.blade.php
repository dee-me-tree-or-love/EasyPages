@foreach($services as $service)

<div>


    <div>
        <h1>
            <a href="/service/{{$service->service_id}}">
                {{$service->title}}
            </a>
        </h1>

        <h4>{{$service->price}}</h4>
        <p>{{$service->ShortDescription()}}</p>
    </div>


</div>

@endforeach