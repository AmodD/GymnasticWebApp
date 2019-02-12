<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.22/vue.js"></script>
</head>
<body>
	<div id="app"> 	
		<div class="hero is-fullheight"  style="background-image: url('/gymnastics3.png')">		
			<div class="section"> 
				@foreach($students as $student)	 
				<div class="columns is-mobile is-multiline 	is-one-quarter">
					<div class="has-text-white"> 
						@php 
							$todaysAttendance = $student->attendances->last()['present'] 
						@endphp
					</div> <br>
					<student  :student="{{$student}}" :attendance = "{{$todaysAttendance}}"></student>	
					
				</div>
				@endforeach	
			</div>
		</div>
	</div>

	<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
