<!doctype html>
<html lang="en">

<div>

@if (Auth::guest())
	<div class="container">
		@yield('content')
	</div>
@else
	<div class="container" style="margin-left: 15%;">
		@yield('content')
	</div>
@endif

    @yield('footer')
	
</div>

</html>
