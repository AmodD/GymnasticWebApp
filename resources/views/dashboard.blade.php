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
		
			Hello, {{$admin->name}}


	<div class="section">
		<div class="columns is-mobile is-multiline">
			<div class="column is-one-quarter">
				<div class="box">
					<article class="media">
						<div class="media-content">
							<div class="content"> <a><strong>Institutes</strong></a></div>
						</div>
						<div class="media-left">
							<figure class="image is-128x128">
								<img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
							</figure>
						</div>						
					</article>
				</div>
			</div>
			<div class="column is-one-quarter">
				<div class="box">
					<article class="media">
						<div class="media-content">
							<div class="content"> <a> <strong>Students</strong> </a></div>
						</div>
						<div class="media-left">
							<figure class="image is-128x128">
								<img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
							</figure>
						</div>						
					</article>
				</div>
			</div>
			<div class="column is-one-quarter">
				<div class="box">
					<article class="media">
						<div class="media-content">
							<div class="content"> <a> <strong>Batches</strong></a></div>
						</div>
						<div class="media-left">
							<figure class="image is-128x128">
								<img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
							</figure>
						</div>						
					</article>
				</div>
			</div>
			<div class="column is-one-quarter">
				<div class="box">
					<article class="media">
						<div class="media-content">
							<div class="content"><a> <strong>Fees</strong></a> </div>
						</div>
						<div class="media-left">
							<figure class="image is-128x128">
								<img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
							</figure>
						</div>						
					</article>
				</div>
			</div>
			<div class="column is-one-quarter">
				<div class="box ">
					<article class="media">
						<div class="media-content">
							<div class="content"> <a><strong>Attendance</strong> </a></div>
						</div>
						<div class="media-left">
							<figure class="image is-128x128">
								<img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
							</figure>
						</div>						
					</article>
				</div>
			</div>
		</div>
	</div>

</body>
</html>