@extends('layouts.app')

@section('content')

    <h2>Friends</h2>
	<hr>

   
        <div class="row">

            <div class="col s8 offset-s2">
                <h3>Pending Friend Requests</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                        </tr>
                    </thead>
		    
                    <tbody>
			@foreach($pending_friends as $pending)
                        <tr>
                            <td>{{ $pending->init_user }}</td>
                            <td><btn class="btn green">Accept</btn></td>
                            <td><btn class="btn red">Decline</btn></td> 
                        </tr>
			@endforeach
                    </tbody>
		    
                </table>

            </div>

        </div>
 

    <div class="row">

        <div class="col s8 offset-s2">
            <h3>Friends</h3>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
		    @foreach($friends as $friend)
                    <tr>
                        <td>
			@if($user->username == $friend->init_user)
				{{ $friend->accept_user }}
			@else
				{{ $friend->init_user }}
			@endif
			</td>
                        <td><btn class="btn cyan">View Recommendations</btn></td>
                        <td><btn class="btn red">Remove Friend</btn></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

@endsection

