<!doctype html>
<html lang="en">

	<head>
		<title>Hotel California - @yield('title')</title>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
	</head>

<div>

	@section('header')

		<nav class="deep-purple">
			<div class="nav-wrapper">
				<a href="index.html" class="brand-logo">&nbsp; Hotel California</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="index.html">Search</a></li>
					<li><a href="friends.html">Friends</a></li>
					<li><a href="account.html">Account</a></li>
					<li><a href="reservations.html">Reservations</a></li>
				</ul>
			</div>
		</nav>

		<div class="row" style="margin-top:10px;">
			<div class="col s12">
				<div class="right">
				
					@if(false)
						[USERNAME] 
					@else						
						<a href="login.html" class="btn cyan">Login</a>
					@endif

				</div>
			</div>
		</div>

	@show

	@if (Auth::guest())
		<div class="container">
			@yield('content')
		</div>
	@else
		<div class="container" style="margin-left: 15%;">
			@yield('content')
		</div>
	@endif

		@yield('footer')

	
	
</div>

</html>
