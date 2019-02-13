@extends('layouts.app')

@section('top')

	@if(Auth::guest())
		@component('components.login', [ 'errors' => $errors] ) @endcomponent
	@else
		@component('components.navbar') @endcomponent
	@endif

@endsection

@section('mainbody')
<h1><span style="color:white">DASHBOARD</span><h1>
<br><br>
<h3><span style="color:white">CENTRES</span><h3>
		<div class="section"> 
			<div class="columns is-mobile is-multiline">
					@foreach ($centres as $centre) 	
					<div class="column is-one-quarter">	
						<div class="box">
									<p class="title is-4" id="centre">{{$centre->name}}</p> 
									<p class="title is-6" id="centre">{{$centre->address}}</p> 
									<a href="/centres/{{$centre->id}}/batches" class="button is-info">Batches</a>
						</div>
					</div>
					@endforeach				
			</div>
		</div>
@endsection
