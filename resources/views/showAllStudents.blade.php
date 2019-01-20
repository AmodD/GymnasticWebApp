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
	<div class="section"> 
		<div class="columns is-mobile is-multiline 	is-one-quarter">
			<div class="card-content">
				
				@foreach ($students as $student) 	
				<form action="/attendances" method="POST">
					{{csrf_field()}}
				<div class="column is-narrow">	
					<a href = "/students" class="card has-text-dark">
						<p class="card-content"> {{$student->name}} {{$student->id}} </p> 
					</a>
					<div class="has-text-white" name="" > {{$today}} </div>
					<input type="hidden" name="day" value="{{$today}}"> 
					<input type="hidden" name="studentId" value="{{$student->id}}">
					<button class="button is-primary" type="submit" name="attendance" value=true>Present</button>
					<button  class="button is-danger" type="submit" name="attendance" value=false>Absent</button>
				</div>
			</form>
				@endforeach				
			</div>
		</div>
	</div>
</div>

</body>
</html>