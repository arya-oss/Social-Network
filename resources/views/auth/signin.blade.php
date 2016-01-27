@extends('layouts.default')

@section('content')
<h3>Sign In</h3>
<div class="row">
	<div class="col-md-6">
		<form class="form-vertical" role="form" method="post" action="{{ route('auth.signin') }}">
			{!! csrf_field() !!}
			<div class="form-group {{ $errors->has('email') ? 'has-error':'' }}">
				<label class="control-label" for="email">Your Email ID</label>
				<input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email')?:'' }}">
				@if ($errors->has('email'))
				<span class="help-block"> {{ $errors->first('email') }}</span>
				@endif
			</div>
			<div class="form-group {{ $errors->has('password') ? 'has-error':'' }}">
				<label class="control-label" for="password">Your Password</label>
				<input type="password" name="password" class="form-control" id="password" placeholder="Password">
				@if ($errors->has('password'))
				<span class="help-block"> {{ $errors->first('password') }}</span>
				@endif
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="remember"> Remember Me 
				</label>
			</div>
			<div class="form-group">
				<button class="btn btn-default" type="submit">Sign in</button>
			</div>
		</form>
	</div>
</div>
@stop