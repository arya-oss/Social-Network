@extends('layouts.default')

@section('content')
	<h3> Update your Profile </h3>
	<div class="row">
		<div class="col-md-6">
			<form class="form-vertical" role="form" method="post" action="{{ route('profile.edit') }}">
				{!! csrf_field() !!}
				<div class="row">
					<div class="col-md-6 {{ $errors->has('first_name') ? 'has-error':'' }}">
						<label class="control-label" for="first_name">First Name</label>
						<input type="text" class="form-control" name="first_name" id="first_name" value="{{old('first_name') ?: Auth::user()->first_name}}">
						@if ($errors->has('first_name'))
						<span class="help-block"> {{ $errors->first('first_name') }}</span>
						@endif
					</div>
					<div class="col-md-6 {{ $errors->has('last_name') ? 'has-error':'' }}">
						<label class="control-label" for="last_name">Last Name</label>
						<input type="text" class="form-control" name="last_name" id="last_name" value="{{old('last_name') ?: Auth::user()->last_name}}">
						@if ($errors->has('last_name'))
						<span class="help-block"> {{ $errors->first('last_name') }}</span>
						@endif
					</div>
				</div>
				<div class="form-group {{ $errors->has('location') ? 'has-error':'' }}">
					<label class="control-label" for="location">Location</label>
					<input type="text" class="form-control" name="location" id="location" value="{{old('location') ?: Auth::user()->location }}">
					@if ($errors->has('location'))
						<span class="help-block"> {{ $errors->first('location') }}</span>
					@endif
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default"> Update </button>
				</div>
			</form>
		</div>
	</div>
@stop