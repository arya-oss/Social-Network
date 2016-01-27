<div class="media">
	<a href="{{ route('profile.index', ['username'=>$user->username]) }}" class="pull-left">
		<img src="{{ $user->getAvatarUrl() }}" class="media-object" alt="{{ $user->getNameOrUsername() }}">
	</a>
	<div class="media-body">
		<h4 class="media-heading"><a href="#">{{ $user->getNameOrUsername() }}</a></h4>
		@if ($user->location)
			<p>{{ $user->location }}</p>
		@endif
	</div>
</div>