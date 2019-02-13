@extends('layouts.app')

@section('top')

	@if(Auth::guest())
		@component('components.login', [ 'errors' => $errors] ) @endcomponent
	@else
		@component('components.navbar') @endcomponent
	@endif

@endsection

@section('mainbody')
	<h1><span style="color:white">STUDENTS</h1>
	<h3><span style="color:white">{{$centreName}}</h3>
	<h5><span style="color:white">{{$batchNameTime}}</h5>
	@component('components.students',["students" => $students]) @endcomponent
@endsection

