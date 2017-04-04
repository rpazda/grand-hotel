<!doctype html>
<html lang="en">


@section('sharedhead')
	<head>
		<title>Hotel California - @yield('title')</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
	</head>

@show
    <body>

        <div class="container">

            @section('header')

                <nav class="deep-purple">
                    <div class="nav-wrapper">
                        <a href="index.html" class="brand-logo">&nbsp; Hotel California</a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="{{ url('search') }}">Search</a></li>
                            <li><a href="{{ url('friends') }}">Friends</a></li>
                            <li><a href="{{ url('account') }}">Account</a></li>
                            <li><a href="{{ url('reservations') }}">Reservations</a></li>
                        </ul>
                    </div>
                </nav>

                <div class="row" style="margin-top:10px;">
                    <div class="col s12">
                        <div class="right">
                        
                            @if(false)
                                [USERNAME] 
                            @else						
                                <a href="{{ url('login') }}" class="btn cyan">Login</a>
                            @endif

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

    <body>

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