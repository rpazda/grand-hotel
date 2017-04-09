@extends('layouts.app')

@section('content')

    <h2>Account</h2>
	<hr>
     <!-- needs to be a form posting to url('account') -->
     <div class="col s8 offset-s2">
	  
          <h4>Update Account Information</h4>

          <div class="row">
            <div class="input-field col s6">
              <input id="first_name" type="text" class="validate" value="{{ $user->firstName }}">
              <label for="first_name">First Name</label>
            </div>
            <div class="input-field col s6">
              <input id="last_name" type="text" class="validate" value="{{ $user->lastName }}">
              <label for="last_name">Last Name</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" class="validate" value="{{ $user->email }}">
              <label for="email">Email</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <input id="password" type="password" class="validate">
              <label for="password">New Password</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <input id="password-confirm" type="password" class="validate">
              <label for="password-confirm">Confirm Password</label>
            </div>
          </div>

          <a class="btn waves-effect waves-light deep-purple darken-1" href="#">Save Changes</a>
          
        </div>

    </div>

@endsection
