<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css" rel="stylesheet">
</head>
<body>
	<div class="hero is-fullheight"  style="background-image: url('gymnastics3.png')">
	@if(Auth::guest())
	<div class="section">
		@component('components.login', [ 'errors' => $errors] ) @endcomponent
	</div>
	@else
	<div class="section">
		@component('components.navbar' ) @endcomponent
	</div>
	@endif
</div>

</body>
</html>
