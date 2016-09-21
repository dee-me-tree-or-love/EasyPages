@extends('layouts.master')

@section('caption')
OUR GLORIOUS SERVICES
@endsection

@section('main_content')

<div class="container">

    @foreach($services as $service)

    <div>


        <div>
            <a href="/service/{{$service->service_id}}">
                <h1>{{$service->title}}</h1>
            </a>

            <h4>{{$service->price}}</h4>
            <p>{{$service->ShortDescription()}}</p>
        </div>


    </div>

    @endforeach
</div>
@endsection
