@extends('layouts.app')

@section('top')

	@if(Auth::guest())
		@component('components.login', [ 'errors' => $errors] ) @endcomponent
	@else
		@component('components.navbar') @endcomponent
	@endif

@endsection

@section('mainbody')
	<h1><span style="color:white">{{ $centreName }}</h1>
	@component('components.batches',["batches" => $batches]) @endcomponent
@endsection
