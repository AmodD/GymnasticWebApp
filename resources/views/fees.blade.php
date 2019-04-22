@extends('layouts.app')

@section('top')

	@if(Auth::guest())
		@component('components.login', [ 'errors' => $errors] ) @endcomponent
	@else
		@component('components.navbar') @endcomponent
	@endif

@endsection

@section('mainbody')
<h1><span style="color:white">FEES</span></h1>
<h4><span style="color:white">CENTRES</span></h4>
<div class="section"> 
	<div class="columns  is-multiline">
	@foreach ($centres as $centre) 	
		<div class="column is-one-quarter">	
			<div class="box">
				<p class="title is-4" id="centre">{{$centre->name}}</p> 
				<p class="title is-6" id="centre">{{$centre->address}}</p> 
				<a href="/fees/centres/{{$centre->id}}" class="button is-warning">Fees & Receipts</a>
				<hr>
				<a href="/fees/centres/{{$centre->id}}/reports" class="button is-danger">Reports</a>
			</div>
		</div>
	@endforeach				
	</div>
</div>
@endsection
