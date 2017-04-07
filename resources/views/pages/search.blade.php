@extends('layouts.app')

@section('content')

	<h2>Search for Rooms</h2>
	<hr>


	<div class="row">

		<div class="col s3">

			<h5>Room Capacity</h5>

			<form action="#">

				<p>
					<input type="checkbox"  id="checkbox1" />
					<label for="checkbox1">Choice 1</label>
				</p>

				<p>
					<input type="checkbox" id="checkbox2" />
					<label for="checkbox2">Choice 2</label>
				</p>

				<p>
					<input type="checkbox" id="checkbox3" />
					<label for="checkbox3">Choice 3</label>
				</p>

			</form>

			<h5>Fridge</h5>

			<form action="#">

				<p>
					<input name="fridge-radio-search" type="radio" id="fridge-no" />
					<label for="fridge-no">No</label>
				</p>
				<p>
					<input name="fridge-radio-search" type="radio" id="fridge-yes" />
					<label for="fridge-yes">Yes</label>
				</p>
				<p>
					<input name="fridge-radio-search" type="radio" id="fridge-either" checked="" />
					<label for="fridge-either">Either</label>
				</p>

			</form>

		</div>
                
		<div class="col s9">
			<!--
			<div class="row" id="room1">
				<div class="col s12">

					<div class="col s3 grey" style="height:200px;">
						image
					</div>

					<div class="col s5">

						<h5>Room 1337</h5>

						<ul>
							<li>2 Queen Beds</li>
							<li>Fridge</li>
							<li>Microwave</li>
							<li>Bathtub</li>
							<li>High-Definition TV</li>
						</ul>
					</div>

					<div class="col s4">
						
						<a href="#" class="btn cyan" style="margin-top: 10px">
							Room Details    
						</a>

						<a href="#" class="btn cyan" style="margin-top: 10px">
							Book Room   
						</a>

					</div>

				</div>
			</div>
			<div class="row" id="room2">
				<div class="col s12">

					<div class="col s3 grey" style="height:200px;">
						image
					</div>

					<div class="col s5">

						<h5>Room 1337</h5>

						<ul>
							<li>2 Queen Beds</li>
							<li>Fridge</li>
							<li>Microwave</li>
							<li>Bathtub</li>
							<li>High-Definition TV</li>
						</ul>
					</div>

					<div class="col s4">
						
						<a href="#" class="btn cyan" style="margin-top: 10px">
							Room Details    
						</a>

						<a href="#" class="btn cyan" style="margin-top: 10px">
							Book Room   
						</a>

					</div>

				</div>
			</div>
			-->
			<!-- new content here! The foreach loop iterates through an array of Room objects.
			     Note that each object is essentially a record from the rooms entity in the database -->
			@foreach($rooms as $room)
				<div class="row">
					<div class="col s12">

					<div class="col s3 grey" style="height:200px;">
						image
					</div>

					<div class="col s5">
							<!-- this call in double braces extracts the value from this record under the 'room_id' column -->
						<h5>Room {{ $room->room_id }}</h5>

						<ul>
							<li>Rate: ${{ $room->rate }}</li>
							<li>Floor: {{ $room->floor }}</li>
							<li>Type: {{ $room->room_type }}</li>
							@if($room->occupied == 0)
							<li>Occupied: no</li>
                                                        @else
                                                        <li>Occupied: yes</li>
     							@endif
						</ul>
					</div>

					<div class="col s4">
						
						<a href="#" class="btn cyan" style="margin-top: 10px">
							Room Details    
						</a>

						<a href="#" class="btn cyan" style="margin-top: 10px">
							Book Room   
						</a>

					</div>

				</div>
				</div>
			@endforeach
			<div class="row" id="room3"></div>
			

		</div>

	</div>

@endsection

