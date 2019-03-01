@extends('layouts.app')

@section('top')

	@if(Auth::guest())
		@component('components.login', [ 'errors' => $errors] ) @endcomponent
	@else
		@component('components.navbar') @endcomponent
	@endif

@endsection

@section('mainbody')
	<h1><span style="color:white">TODAY'S ATTENDANCES</h1>
	<h4><span style="color:white">{{$centreName}}</h4>
	<h5><span style="color:white">{{$batchNameTime}}</h5>
	@component('components.students',["students" => $students]) @endcomponent
@endsection

