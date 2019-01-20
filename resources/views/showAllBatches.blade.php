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
				@foreach ($batches as $batch) 	
				<form action="/students" method="GET">
			<div class="column is-narrow">	
				<!-- <div class="card"> -->
					<!-- <a href = "/students" class="card has-text-dark"> -->
						<p class="card-content"> 
						 <button  class="button is-info" type="submit" name="submit">  {{$batch->name}}  {{$batch->time}} </button>
						</p>
						<input type="hidden" name="batchId" value="{{$batch->id}}">
						<!-- <button type="submit" name="submit" class="button is-info">Submit </button> -->
				<!-- </div>		  -->
					<!-- </a> -->
					
			</div>
		</form>
			@endforeach				
		</div>
		</div>
	</div>
</div>

</body>
</html>