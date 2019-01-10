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

	<form >
		<a class="button is-dark is-pulled-right has-text-white" style="margin-left: 30px;margin-right: 10px">Login</a>		
		
		<div class="field  is-pulled-right" >
			<div class="control">
				<input id="password" class="input is-primary has-text-grey" type="text" value="password" 
					style="margin-left: 20px"> 
			</div>
		</div>

		<div class="field  is-pulled-right" >
			<div class="control">
				<input id="username" name ="username"class="input is-primary has-text-grey" type="text" value="username"> 
			</div>
		</div>

	</form>

</body>
</html>