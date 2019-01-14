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
	<div class="section">
		<form action="/users" method="POST">
			{{csrf_field()}}

			<div class="columns is-pulled-right">
				<div class="field" >
					<div class="control">
						<input id="email" name ="email"class="input is-primary has-text-grey" type="text" placeholder ="email"> 
					</div>
			</div>

			<div class="field" >
				<div class="control">
					<input name ="password" type="password"id="password" class="input is-primary has-text-grey" placeholder="password"> 
				</div>
			</div>

			<button class="button is-dark  has-text-white" type="submit" style="margin-left: 10px">
				Login</buton>
			</form>
		</div>
	</body>
	</html>