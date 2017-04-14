@extends('layouts.app')

@section('title', 'Search')

@section('content')

	<h2>Search for Rooms</h2>
	<hr>


	<div class="row">
                
		<div class="col s12">
			<!-- new content here! The foreach loop iterates through an array of Room objects.
			     Note that each object is essentially a record from the rooms entity in the database -->
			<div class="col m6">
				<p>
					<label for="reserve-date" class="control-label">Desired Reservation Date</label>
					<input type="date" class="datepicker" id="reserve-date">
				</p>
			</div>
			<div class="col m6">

				<h5>Room Type &nbsp; 
					<a href="#room-info-modal" >
						<i class="material-icons">live_help</i>
					</a>
				</h5>

				<form action="#">

					<p>
						<input name="room-type-radio" type="radio" class="with-gap" id="economy-radio" />
						<label for="economy-radio">Economy</label>
					</p>

					<p>
						<input name="room-type-radio" type="radio" class="with-gap" id="midtier-radio" />
						<label for="midtier-radio">Midtier</label>
					</p>

					<p>
						<input name="room-type-radio" type="radio" class="with-gap" id="penthouse-radio" />
						<label for="penthouse-radio">Penthouse</label>
					</p>
					<p>
						<input name="room-type-radio" type="radio" class="with-gap" id="any-type-radio" />
						<label for="any-type-radio">Any</label>
					</p>

					<script>
						
					</script>

				</form>

			</div>

			<div id="rooms">
				
				<input style="display:none;" class="search" id="filter-box" placeholder="search"></input>

				<button class="sort btn" data-sort="rate">
					Sort by Rate
				</button>
				<button class="sort btn" data-sort="floor">
					Sort by Floor
				</button>
				
				<ul class="list">

					@foreach($rooms as $room)
						<li>
	
							<div class="row">
								<div class="col s12">

									<div class="col s4" style="">
										@if($room->room_type == "economy")
											<img style="width:100%"src="http://www.marinabaysands.com/content/dam/singapore/marinabaysands/master/main/home/hotel/deluxe1500x930.jpg">
										@elseif($room->room_type == "midtier")
											<img style="width:100%" src="http://cdn-image.travelandleisure.com/sites/default/files/styles/1600x1000/public/hotel-interior-room0416.jpg?itok=5gENxAK1">
										@else
											<img style="width:100%" src="https://24e6775f46a3464c86d1-63c1408f30406ab59a3456736658a2ee.ssl.cf1.rackcdn.com/2016/08/penthouse_gallery_2_2.jpg">
										@endif
									</div>

									<div class="col s5">
											<!-- this call in double braces extracts the value from this record under the 'room_id' column -->
										<h5>Room <span class="room-id">{{ $room->room_id }}</span></h5>

										<ul>
											<li>Rate: <span class="rate">${{ $room->rate }}</span></li>
											<li>Floor: <span class="floor">{{ $room->floor }}</span></li>
											<li>Type: <span class="room-type">{{ $room->room_type }}</span></li>
											<!-- @if($room->occupied == 0)
											<li>Occupied: <span class="occupied">no</span></li>
												@else
												<li>Occupied: <span class="occupied">yes</span></li>
												@endif -->
										</ul>
									</div>

									<div class="col s3">
										
										<a href="{{ url('search/'.$room->room_id ) }}" class="btn cyan" style="margin-top: 10px">
											Room Details    
										</a>
       
										<a href="{{ url('reservations/reserve/room='.$room->room_id.'&date='.$sel_date) }}" class="btn cyan" style="margin-top: 10px">
											Book Room   
										</a>

									</div>

								</div>
							</div>
						</li>
					@endforeach

				</ul>
			</div>

			<script>
				
			</script>

		</div>

	</div>
<!--
	<div id="room-info-modal" class="modal">
		<div class="modal-content">
			
			<h4>Room Types</h4>
			<table>
				<thead>
					<tr>
						<th>Type</th>
						<th>Capacity</th>
						<th>Fridge</th>
						<th>Room Safe</th>
						<th>Balcony</th>
					</tr>
				</thead>
					<tr>
						<td>
							Economy
						</td>
						<td>
							1
						</td>
						<td>
							No
						</td>
						<td>
							No
						</td>
						<td>
							No
						</td>
					<tr>
					<tr>
						<td>
							Midtier
						</td>
						<td>
							2
						</td>
						<td>
							Yes
						</td>
						<td>
							No
						</td>
						<td>
							Yes
						</td>
					<tr>
					<tr>
						<td>
							Economy
						</td>
						<td>
							5
						</td>
						<td>
							Yes
						</td>
						<td>
							Yes
						</td>
						<td>
							Yes
						</td>
					<tr>
				<tbody>
				</tbody>
			</table>

		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-green btn">Ok</a>
		</div>
	</div>
-->
	<script>	
		var options = {
			valueNames: ['room-id','rate', 'floor', 'room-type', 'occupied']
		};
		var roomList= new List('rooms', options);

		$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 15 // Creates a dropdown of 15 years to control year
		});
		$('#reserve-date').change( function(){
			//$('reserve-date').val(); to get date as DD MONTH, YYYY
			//Call controller to return view with refined to new date and not reserved
			//Need a new route that takes date param that will be passed here
		});
		$('.modal').modal();

		$('#economy-radio').click( function(){
			roomList.filter();	//clear filter
			roomList.search('economy', ['room-type']);
			//$('#filter-box').empty();
			//$('#filter-box').val("economy");
			//$('#filter-box').focus();
		});
		$('#midtier-radio').click( function(){
			roomList.filter();	//clear filter
			roomList.search('midtier', ['room-type']);
			
		});
		$('#penthouse-radio').click( function(){
			roomList.filter();	//clear filter
			roomList.search('penthouse', ['room-type']);
			
		});
		$('#any-type-radio').click( function(){
			roomList.search();	//clear filter
			
		});
		

	</script>

@endsection

