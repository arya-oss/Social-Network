<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a href="#" class="navbar-brand">RaHackYa</a>
		</div>
		<div class="collapse navbar-collapse">
			@if (Auth::check())
			<ul class="nav navbar-nav">
				<li><a href="{{ route('home') }}">Timeline</a></li>
				<li><a href="{{ route('friends.index') }}">Friends</a></li>
			</ul>
			<form class="navbar-form navbar-left" role="search" action="{{ route('search.results') }}">
				<div class="form-group">
					<input type="text" name="query" placeholder="Find People" class="form-control">
				</div>
				<button class="btn btn-default" type="submit">Search</button>
			</form>
			@endif
			<ul class="nav navbar-nav navbar-right">
				@if (Auth::check())
				<li><a href="{{ route('profile.index', ['username' => Auth::user()->username]) }}">{{ Auth::user()->getNameOrUsername() }} </a></li>
				<li><a href="{{ route('profile.edit') }}">Update Profile</a></li>
				<li><a href="{{ route('auth.signout') }}">Sign out</a></li>
				@else
				<li><a href="{{ route('auth.signup') }}">Sign up</a></li>
				<li><a href="{{ route('auth.signin') }}">Sign in</a></li>
				@endif
			</ul>
		</div>
	</div>
</nav>