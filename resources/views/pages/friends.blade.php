@extends('layouts.app')

@section('content')

    <h2>Friends</h2>
	<hr>
    
   @if(count($pending_friends) > 0)
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
        <hr>
    @endif

    <div class="row">

        <div class="col s8 offset-s2">
            <h3>Your Friends</h3>
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
                            <?php 
                                if ($user->username == $friend->init_user)
                                    $deleteFriend = $friend->accept_user;
                                else
                                    $deleteFriend = $friend->init_user;
                            ?>
                            @if($user->username == $friend->init_user)
                                {{ $friend->accept_user }}
                            @else
                                {{ $friend->init_user }}
                            @endif
			            </td>
                        <td><a href="" class="btn cyan">View Recommendations</a></td>
                        <td><a href="{{action('FriendsController@removeFriend', ['deleteFriend' => $deleteFriend])}}" class="btn red">Remove Friend</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <hr>

    <div class="row">
        <center>
            <a href="#add-friend-modal" class="btn">Add Friend</a>
        <center>
    </div>

    <div class="modal" id="add-friend-modal">
        <div class="modal-content" >

            <form>
                <div class="input-field">
                    <input placeholder="Placeholder" id="search-name" type="text" class="validate">
                    <label for="search-name">User Name</label>
                </div>
                <div class="row" id="search-results">

                </div>
                <button id="clear-search-button" class="btn red">Clear</button>
                <button id="perform-search-button" class="btn ">Search</button>

            </form>

        </div>
        <div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-green btn">Ok</a>
		</div>
    </div>

    <script>
        $('.modal').modal();

        $('#clear-search-button').click( function(){
			$('#search-name').val('');
		});

    </script>

@endsection

