@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="col-md-5">
			@include ('user.partials.userblock')
			<hr>
			
		</div>
		<div class="col-md-4 col-md-offset-3">
			@if (Auth::user()->hasFriendRequestPending($user))
				<p>Waiting for <a href="#"> {{ $user->getNameOrUsername() }}</a> to accept your request.</p>
			@elseif (Auth::user()->hasFriendRequestRecieved($user))
				<a href="{{ route('friends.accept',['username'=>$user->username]) }}" class="btn btn-primary">Accept Friend Request</a>
			@elseif (Auth::user()->isFriendsWith($user))
				<p>You and {{ $user->getNameOrUsername() }} are friends.</p>
			@elseif (Auth::user()->id !== $user->id)
				{{ Auth::user()->id }} {{$user->id}}	
				<a href="{{ route('friends.add',['username'=>$user->username]) }}" class="btn btn-primary">Add Friend</a>
			@endif
			
			<h4>{{ $user->getFirstNameOrUsername() }}'s friends.</h4>
			@if (!$user->friends()->count())
				<p>{{ $user->getFirstNameOrUsername() }} has no friends.</p>
			@else
				@foreach($user->friends() as $user)
					@include ('user.partials.userblock')
				@endforeach
			@endif
		</div>
	</div>
@stop