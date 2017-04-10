@extends('layouts.app')

@section('title', 'Room') 

@section('content')

	<h2>Room {{ $room->room_id }} Details</h2>
	<hr>


	<div class="row">
                
		<div class="col s12">
			<ul class="list">
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
							<ul>
								<li>Rate: <span class="rate">${{ $room->rate }}</span></li>
								<li>Floor: <span class="floor">{{ $room->floor }}</span></li>
								<li>Type: <span class="room-type">{{ $room->room_type }}</span></li>
								@if($room->occupied == 0)
									<li>Occupied: <span class="occupied">no</span></li>
								@else
								<li>Occupied: <span class="occupied">yes</span></li>
								@endif
								<li>
									<a href="#" class="btn cyan" style="margin-top: 10px">
										Book Room   
									</a>
								</li>
							</ul>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col s12">
			
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
							Penthouse							
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
	</div>
@endsection
