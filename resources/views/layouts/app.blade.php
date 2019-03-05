
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css" rel="stylesheet">
	<link href="{{asset('css/app.css')}}" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>	
	<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>

	<title>{{ config('app.name', 'Laravel123') }}</title>
</head>
<body>
		<section class="hero is-fullheight-with-navbar"   style="background-image: linear-gradient(rgba(0, 0, 0, 0.49),rgba(0, 0, 0, 0.49)), url('gymnastics_split.jpg'); background-size: 100% 100%; 	background-attachment:fixed;" >
			@yield('top')

			<div class="hero-body">
				<div class="container">

					@yield('mainbody')

					@component('components.errordisplay') @endcomponent
					@yield('footer')

				</div>
			</div>
						@yield('images')
			</section>

		<script type="text/javascript" src="/js/app.js" ></script>

	</body>
	</html>
