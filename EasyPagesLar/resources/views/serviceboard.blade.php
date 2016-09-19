@extends('layouts.master')

@section('caption')
OUR GLORIOUS SERVICES
@endsection

@section('main_content')
<div style="position: absolute; width: 70%; margin: auto; overflow-y: scroll;">
     <div class="container" style="display: flex; width: 100%; margin: auto; height: 100%; ">

        @foreach($services as $service)

        <div style="border: 1px #736b6f solid; width: 35%; margin: 0pt 3pt 0pt 3pt ">


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
</div>
@endsection
