@extends ('layouts.default')

@section ('content')
	<div class="row">
		<div class="col-md-6">
			<h3>Your Friends</h3>
			<!-- List of friends -->
			@if (!$friends->count())
				<p>You have no friends.</p>
			@else
				@foreach($friends as $user)
					@include ('user.partials.userblock')
				@endforeach
			@endif
		</div>
		<div class="col-md-6">
			<h4> Friend Requests </h4>
			@if (!$requests->count())
				<p>You have no friends.</p>
			@else
				@foreach($requests as $user)
					@include('user.partials.userblock')
				@endforeach
			@endif
		</div>
	</div>
@stop