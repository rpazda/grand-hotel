@extends('layouts.app')

@section('title', 'Login')

@section('content')
	<h2>Welcome to the login page!</h2>
	<hr>

	<body>
    <!-- page content -->

		<div class="row">

			<div class="col s6">

			<h4>Returning Users</h4>
			
			<div class="row">
				<div class="input-field col s10">
				<input id="email" type="email" class="validate">
				<label for="email">Email</label>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s10">
				<input id="password" type="password" class="validate">
				<label for="password">Password</label>
				</div>
			</div>

			<a class="btn waves-effect waves-light deep-purple darken-1" href="#">Login</a>

			<a class="btn waves-effect waves-light cyan darken-1" href="#">Forgot Password</a>

			</div>

			<div class="col s6">

			<h4>New Users</h4>

			<div class="row">
				<div class="input-field col s6">
				<input id="first_name" type="text" class="validate">
				<label for="first_name">First Name</label>
				</div>
				<div class="input-field col s6">
				<input id="last_name" type="text" class="validate">
				<label for="last_name">Last Name</label>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s12">
				<input id="email" type="email" class="validate">
				<label for="email">Email</label>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s12">
				<input id="password" type="password" class="validate">
				<label for="password">Password</label>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s12">
				<input id="password-confirm" type="password" class="validate">
				<label for="password-confirm">Confirm Password</label>
				</div>
			</div>

			<a class="btn waves-effect waves-light deep-purple darken-1" href="#">Create Account</a>
			
			</div>

		</div>

  	</body>

@endsection

