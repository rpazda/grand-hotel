@extends('layouts.app')

@section('content')
    
    <h3>Reservations</h3>
	<hr>

    <div class="row">
        <div class="col s12">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Room</th>
                        <th>Paid</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($reservation_data) > 0)
                    @foreach($reservation_data as $reservation)

                    <div style="display:none">

                    </div>

		            <tr>
                        <td>{{ $reservation->reservationStartDate }}</td>
                        <td>{{ $reservation->room }}</td>
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
                         
                        @if($reservation->reservationStartDate < date("Y-m-d H:i:s"))
                            <td>    
                                <a href="{{ url('reservations/recommendRoom/room='.$reservation->room.'&date='.$reservation->reservationStartDate)}}" class="btn teal">Recommend</a>
                            </td>
                        @else
                            <td>
                                <a href="{{ url('reservations/deleteReservation', 'res_id='.$reservation->id) }}" class="btn red">Cancel</a>
                            </td>
                        @endif

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

    <style>
        .qrcode > canvas{
            width: 100%;
        }
    </style>

    @foreach($reservation_data as $reservation)
        <div id="reservation-info-modal-{{ $reservation->id }}" class="modal">
            <div class="modal-content" id="modal-content-{{ $reservation->id }}">
                <div class="row">
                    <div class="col m8">
                        <table>
                            <tbody>
                                <tr><td>Booked by:</td><td> {{ $reservation->username}}</td></tr>
                                <tr><td>Date of Stay:</td><td> {{ $reservation->reservationStartDate}}</td></tr>
                                <tr><td>Paid:</td><td> @if($reservation->paid == 1)
                                                            Yes
                                                        @else
                                                            No 
                                                        @endif
                                </td></tr>
                                <tr><td>Date of Booking: </td><td>{{ $reservation->dateReserved }}</td></tr>
                                <tr><td>Room No.: </td><td>{{ $reservation->room }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col m4">
                        Check-In QR code
                        <p>
                            <div class="qrcode" id="qrcode-{{ $reservation->id }}"style="width:80%"></div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn">Ok</a>
                &nbsp;
                <a class="btn cyan modal-action" id="print-reservation-{{ $reservation->id }}" target="_blank">Print</a>
            </div>
        </div>
        <script>
            //generate QR code for specific reservation
            $('#qrcode-{{ $reservation->id }}').qrcode("{{ $reservation->id }}");
            
            //print function for reservation information
            $('#print-reservation-{{ $reservation->id }}').click( function(){
                //set window content to only reservation details
                document.body.innerHTML = $("#modal-content-{{ $reservation->id }}").html();
                //remove empty canvas, old one won't render here anymore
                $('#qrcode-{{ $reservation->id }}').empty();
                //regenerate QR canvas
                $('#qrcode-{{ $reservation->id }}').qrcode("{{ $reservation->id }}");

                window.print();
            });
        </script>
    @endforeach

    <script>
        //init modal class
        $('.modal').modal();
    </script>
@endsection

