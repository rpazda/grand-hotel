<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

@section('sharedhead')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hotel California - @yield('title')</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="{{ public_path('js/app.js')}}"></script>

    <!-- Materialize, Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

    <!-- Materialize, Compiled and minified JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    
    <!--ListJS-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <!--Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

@show
<body>

    <div class="container">
	@section('header')
        <nav class="deep-purple">
            <div class="nav-wrapper">
                
		 <a href="{{ url('search')}}" class="brand-logo">&nbsp; Hotel California</a>
                 <ul id="nav-mobile" class="right hide-on-med-and-down">
                     <li><a href="{{ url('search') }}">Search</a></li>
                     <li><a href="{{ url('friends') }}">Friends</a></li>
                     <li><a href="{{ url('account') }}">Account</a></li>
                     <li><a href="{{ url('reservations') }}">Reservations</a></li>
                 </ul>
	     </div>
         </nav>

         <div class="row" style="margin-top:10px">
              <div class="col s12">
                   <div class="right">
                    
                    <ul id="nav-mobile" class="right hide-on-mde-and-down">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('login') }}">Login</a></li>
                            <li><a href="{{ url('register') }}">Register</a></li>
                        @else
                            <li>
                                <a href="#" class="dropdown-button btn" data-activates="dropdown1">
                                    {{ Auth::user()->username }}
                                </a>

                                <ul id="dropdown1" class="dropdown-content">
                                    <li>
                                        <a href="{{ url('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                   </div>
              </div>
         </div>
        @show
        <div class="row">

	        @yield('content')
            
        </div>

	 <div class="row grey lighten-2">
                <span style="padding: 5px">
                <center>Group 17 - 2017</center>
                </span>
         </div>
    </div>

</body>
</html>

@if (Auth::guest())
    <div class="container">
        @yield('contents')
    </div>
@else
    <div class="container" style="margin-left: 15%;">
        @yield('contents')
    </div>
@endif
