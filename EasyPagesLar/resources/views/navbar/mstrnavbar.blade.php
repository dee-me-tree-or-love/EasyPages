

@section('navbar')
    <div class="top-left links">
        <a href="{{ url('/services') }}">\(^_^)/</a>
        <a href="{{ url('/#') }}">/(0_0)\</a>
    </div>
    @if (Auth::guest())
    <div class="top-right links">
        <a href="{{ url('/login') }}">Login</a>
        <a href="{{ url('/register') }}">Register</a>
    </div>
    @else
    <div class="top-right links">
        <a href="/profile/{{Auth::user()->id}}"> {{Auth::user()->username}} </a>
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
@endsection