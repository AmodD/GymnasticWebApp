@extends('layouts.app')

@section('top')

	@if(Auth::guest())
		@component('components.login', [ 'errors' => $errors] ) @endcomponent
	@else
		@component('components.navbar') @endcomponent
	@endif

@endsection

@section('mainbody')
	<h1 class="has-text-centered"><span style="color:white">PAY FEES & SEND RECEIPTS</h1>
	@component('components.fee', [ 'centre' => $centre ,
					'students' => $students] ) @endcomponent
@endsection
