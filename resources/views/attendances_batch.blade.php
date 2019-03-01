@extends('layouts.app')

@section('top')

	@if(Auth::guest())
		@component('components.login', [ 'errors' => $errors] ) @endcomponent
	@else
		@component('components.navbar') @endcomponent
	@endif

@endsection

@section('mainbody')
	<h1><span style="color:white">MARK ATTENDANCES</h1>
	<h4><span style="color:white">{{$batch->centre->name}}</h4>
	<h5><span style="color:white">{{$batch->time}}</h5>
	@component('components.attendance', [ 'batch' => $batch] ) @endcomponent
@endsection
