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
		<div class="columns is-mobile is-multiline 	is-centered">
			<div class="card-content">
				@foreach ($institutes as $institute) 	
			<div class="column is-narrow">	
			
			<form action= "institutes/{{$institute->id}}" method="POST">
				{{csrf_field()}}		
				<div class="box">
					<div class="card-content">
						<div class="media-content"><p class="title is-4">{{$institute->name}}</p> 
							
							<a href ="institutes/{{$institute->id}}/edit" id ="modify" class="button is-warning"> Students </a>
							
							<a href ="institutes/{{$institute->id}}" class="button is-info">Attendance</a>
							
							<button class="button is-danger" type="submit" name="_method" value="DELETE"> Fees </button>

						</div>
					</div>
				</div>
				</form>
			
			</div>
			@endforeach				
		</div>
		</div>
	</div>
</div>

</body>
</html>