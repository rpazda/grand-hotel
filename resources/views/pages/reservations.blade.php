@extends('layouts.app')

@section('content')
    
    <h3>Reservations</h3>
	<hr>

    <div class="row">
        <div class="col s8 offset-s2">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Room</th>
                        <th>Paid</th>
                    </tr>
                </thead>
                <tbody>
                @if($reservation_data)
                    @foreach($reservation_data as $reservation)
		    <tr>
                        <td>{{ $reservation->reservationStartDate }}</td>
                        <td>{{ $reservation->room }}</td>
                        <td>
			@if($reservation->paid == 1)
				yes
			@else
				no
			@endif

			<td>
                        <td><btn class="btn cyan">View Details</btn></td>
                        @if($reservation->paid == 0)
			<td><a href="payment.html" class="btn green">Pay</a></td>
			@endif
                    </tr>
		    @endforeach
                @else
		    <tr> <td>No reservations!</td></tr>
		@endif
                </tbody>
            </table>

        </div>
    </div>
@endsection

