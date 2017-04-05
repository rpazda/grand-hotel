@extends('layouts.app')

@section('title', 'Login')

@section('content')
	<h2>Staff Control Panel</h2>
	<hr>

    <div class="row">

        <div class="row">
            <center>
            <a href="{{ url('viewguestbookings')}}" class="btn cyan" style="margin-top: 10px">
                View Bookings   
            </a>
            </center>
        </div>
        <div class="row">
            <center>
            <a href="{{ url('checkin')}}" class="btn cyan" style="margin-top: 10px">
                Check In Guests 
            </a>
            </center>
        </div>
        

    </div>

@endsection