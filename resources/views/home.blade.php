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
		<form action="{{ route('login') }}" method="POST">
			{{csrf_field()}}

			<div class="columns is-mobile is-pulled-right is-multiline">
				<div class = "column is-narrow is-4 is-offset-1">
					<div class="field" >
						<div class="control">
							<input id="email" name ="email" class="input is-primary has-text-grey" type="text" placeholder ="email">							 			
						</div>
						<p class="help is-danger">{{ $errors->first('email') }}</p>		
					</div>
				</div>		
				<div class = "column is-narrow is-4 is-offset-0">
					<div class="field" >
						<div class="control">
							<input name ="password" type="password"id="password" class="input is-primary has-text-grey" placeholder="password">							 	
						</div>
						<p class="help is-danger">{{ $errors->first('password') }}</p>						
					</div>
				</div>		

				<div class = "column is-narrow is-1 is-offset-0">
					<button class="button is-dark  has-text-white" type="submit" style="margin-left: 10px">
						Login
					</button>		
				</div>

				<div class = "column is-narrow">				
									
				</div>		
					
			</div>	
		</div>

	</form>

</div>
</div>

</body>
</html>