@extends('layouts.app')

@section('title', 'Recommendations')

@section('content')

	<h4>Rooms Recommended by {{ $friend }}</h4>
	<hr>


	<div class="row">
		<ul class="list">
			@foreach($recommended_rooms as $recommended)
				<li>
					<div class="col s12">
						<div class="col s5">
							<h5>Room <span class="room-id">{{ $recommended->room }}</span></h5>
						</div>

						<div class="col s3">
										
						<a href="{{ url('search/room/'.$recommended->room ) }}" class="btn cyan" style="margin-top: 10px">
							Room Details    
						</a>
						</div>
					</div>
				</li>
			@endforeach
		</ul>
	</div>

@endsection

