@extends('layouts.app')

@section('content')

    <h2>Account</h2>
	<hr>
     <!-- needs to be a form posting to url('account') -->
     <div class="col s8 offset-s2">
        <form class="" role="form" method="POST" action="{{ action('AccountController@modifyAccountInfo')}}">
            
            {{ csrf_field() }}
            
            <h4>Update Account Information</h4>

            <div class="row">
              <div class="form-group {{ $errors->has('firstName') ? ' has-error' : '' }}">
                <div class="input-field col s6">
                  <input id="firstName" name="firstName" type="text" class="validate" value="{{ $user->firstName }}">
                  <label for="firstName">First Name</label>
                  @if ($errors->has('firstName'))
                      <span class="help-block">
                          <strong>{{ $errors->first('firstName') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group {{ $errors->has('lastName') ? ' has-error' : '' }}">
                <div class="input-field col s6">
                  <input id="lastName" name="lastName" type="text" class="validate" value="{{ $user->lastName }}">
                  <label for="lastName">Last Name</label>
                  @if ($errors->has('lastName'))
                      <span class="help-block">
                          <strong>{{ $errors->first('lastName') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">  
                <div class="input-field col s12">
                  <input disabled id="username" name="username" type="text" class="validate" value="{{ $user->username }}">
                  <label for="username">User Name</label>
                  @if ($errors->has('username'))
                      <span class="help-block">
                          <strong>{{ $errors->first('username') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">  
                <div class="input-field col s12">
                  <input id="email" name="email" type="email" class="validate" value="{{ $user->email }}">
                  <label for="email">Email</label>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}"> 
                <div class="input-field col s12">
                  <input id="password" name="password" type="password" class="validate form-control">
                  <label for="password">New Password</label>
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group"> 
                <div class="input-field col s12">
                  <input id="password-confirm" type="password" class="validate form-control">
                  <label for="password-confirm">Confirm Password</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group"> 
                <button type="submit" class="btn waves-effect waves-light deep-purple darken-1" >Save Changes
                </button>
              </div>
            </div>
            
          </div>
        </form>
    </div>

@endsection
