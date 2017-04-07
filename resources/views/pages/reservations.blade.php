@extends('layouts.app')

@section('content')
    
    <h2>Reservations</h2>
	<hr>

    <div class="row">
        <div class="col s8 offset-s2">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Room</th>
                        <th>Total</th>
                        <th>Paid</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01/01/1999</td>
                        <td>199</td>
                        <td>$350.00</td>
                        <td>Yes<td>
                        <td><btn class="btn cyan">View Details</btn></td>
                    </tr>
                    <tr>
                        <td>01/01/1999</td>
                        <td>199</td>
                        <td>$350.00</td>
                        <td>Yes<td>
                        <td><btn class="btn cyan">View Details</btn></td>
                    </tr>
                    <tr>
                        <td>01/01/1999</td>
                        <td>199</td>
                        <td>$350.00</td>
                        <td>Yes<td>
                        <td><btn class="btn cyan">View Details</btn></td>
                    </tr>
                    <tr>
                        <td>01/01/1999</td>
                        <td>199</td>
                        <td>$350.00</td>
                        <td>No<td>
                        <td><btn class="btn cyan">View Details</btn></td>
                        <td><a href="payment.html" class="btn green">Pay</a></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection

