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
					@foreach ($centres as $centre) 	
					<div class="column is-narrow">	
						<form action= "/batches" method="GET">
							{{csrf_field()}}		
							<div class="box">
								<div class="card-content">
									<div class="media-content" >
										<input  type="hidden" name="centreId" 
											value="{{$centre->id}}"> </input>

									<p class="title is-4" id="centre">{{$centre->name}}</p> 

									<button type="submit" name="attendance"class="button is-info">Attendance </button>
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
