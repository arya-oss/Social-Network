<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>RaHackYa | A Developers Place</title>
	{!! Html::style('css/bootstrap.min.css') !!}
</head>
<body>
@include('layouts.partials.navigation')
<div class="container">
	@include('layouts.partials.alerts')
	@yield('content')
</div>
	{!! Html::script('js/jquery.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
</body>
</html>