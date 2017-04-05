@extends('layouts.app')

@section('content')

    <h2>Friends</h2>
	<hr>

    @if(false/*Do not show pending requests div if none exist*/)
        <div class="row">

            <div class="col s8 offset-s2">
                <h3>Pending Friend Requests</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Exelcius Ample</td>
                            <td><btn class="btn green">Accept</btn></td>
                            <td><btn class="btn red">Decline</btn></td>
                        </tr>
                        <tr>
                            <td>Exelcius Ample</td>
                            <td><btn class="btn green">Accept</btn></td>
                            <td><btn class="btn red">Decline</btn></td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    @endif

    <div class="row">

        <div class="col s8 offset-s2">
            <h3>Friends</h3>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Exelcius Ample</td>
                        <td><btn class="btn cyan">View Recommendations</btn></td>
                        <td><btn class="btn red">Remove Friend</btn></td>
                    </tr>
                    <tr>
                        <td>Exelcius Ample</td>
                        <td><btn class="btn cyan">View Recommendations</btn></td>
                        <td><btn class="btn red">Remove Friend</btn></td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>

@endsection

