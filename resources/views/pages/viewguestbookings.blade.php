@extends('layouts.app')

@section('title', 'View Bookings')

@section('content')
	<h2>Guest Bookings</h2>
	<hr>

    <div class="row">
        <div class="col s12" id="reservations">

            <input class="search" placeholder="Search Reservations" />

            <table>
                <thead>
                    <tr>
                        <th>Guest</th>
                        <th>Date</th>
                        <th>Room</th>
                        <th>Paid</th>
                    </tr>
                </thead>
                <tbody class="list">
                @if($reservation_data)
                    @foreach($reservation_data as $reservation)

                    <div style="display:none">

                    </div>

		            <tr>    
                        <td><span class="username">{{ $reservation->username }}</span></td>
                        <td><span class="start-date">{{ $reservation->reservationStartDate }}</span></td>
                        <td><span class="room-id">{{ $reservation->room }}</span></td>
                        <td>
                            @if($reservation->paid == 1)
                                Yes
                            @else
                                No 
                            @endif

                        <td>
                        <td>
                            <a href="#reservation-info-modal-{{ $reservation->id }}"class="btn cyan">View Details</a>
                        </td>
                         
                        @if($reservation->reservationStartDate > date("Y-m-d H:i:s"))
                            <td>
                                <a href="{{ url('reservations/deleteReservation', 'res_id='.$reservation->id) }}" class="btn red">Cancel</a>
                            </td>
                        @else
                            <td></td>
                        @endif

                        @if($reservation->paid == 0)
                            <td><a href="payment.html" class="btn green">Pay</a></td>
                        @else
                            <td></td>
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

    <script>	
		var options = {
			valueNames: ['username','start-date','room-id']
		};
		var roomList= new List('reservations', options);
    </script>

@endsection