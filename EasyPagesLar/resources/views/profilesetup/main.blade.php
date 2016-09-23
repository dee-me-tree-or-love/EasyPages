@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Congrats, You are logged in!</div>

                <div class="panel-body">
                    @if(Auth::guest())
                        <h1> WHAT THE FUCK ARE YOU DOING HERE?!</h1>
                    @else
                        @if(Auth::user()->type == 'i')
                            @include('profilesetup.individual')
                        @else
                            @include('profilesetup.corporate')
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection