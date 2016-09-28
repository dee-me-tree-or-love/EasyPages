<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Easy Pages</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/master.css" rel="stylesheet">    
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <!--@include('navbar.mstrnavbar') 
            Does not work! -->

            <div class="top-left links">
                <a href="{{ url('/service') }}"><!--\(^_^)/-->SERVICES</a>
                <!--<a href="{{ url('/#') }}">/(0_0)\</a>-->
            </div>
            @if (Auth::guest())
            <div class="top-right links">
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            </div>
            @else
            <div class="top-right links">
                <a href="/user/{{Auth::user()->id}}"> {{Auth::user()->username}} </a>
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>

            @endif


            <div class="content">
                <div class="title m-b-md">

                    @yield('caption')
                </div>
            </div>   



            <!--
                            <div class="links">
                                <a href="#">Refreshments?</a>
                                
                            </div>
            -->

        </div>
        <div class="flex-center">
            @yield('main_content')
        </div>
    </body>
</html>
