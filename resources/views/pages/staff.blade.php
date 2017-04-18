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
            <a href="#checkin-modal" class="btn cyan" style="margin-top: 10px">
                Check In Guests 
            </a>
            </center>
        </div>
        

    </div>

    <div id="checkin-modal" class="modal">
            <div class="modal-content" id="checkin-modal-content">
                <h6>Checkin hardware no yet configured!</h6>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn">Ok</a>
            </div>
        </div>

    <script>

        $('.modal').modal();

        

    </script>

@endsection