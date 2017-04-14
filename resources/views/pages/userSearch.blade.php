
@extends('layouts.app')

@section('content')

    <h3>Matching Users</h3>
    <h6>Click to send the user a request</h6>
	<hr>

   @if(count($matching_users) > 0)


    <div class="row">

        <div class="col s8 offset-s2">
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
		    @foreach($matching_users as $match)
                    <tr>
			<td>
				{{ $match->username }}
                        </td>
                        <td><a href="{{ $url = url('/friends/add/'.$match->username) }}" class="btn red">Request Friend</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
    
    @else
    <div class="row">
	
	<div class="col s8 offset-s2">
		<p>Looks like there were no matches. <a href="#" onclick="window.history.back()"> Go back</a>.</p>	
	</div>
    </div>

    @endif

@endsection

