@extends('layouts.app')

@section('top')
	@if(Auth::guest())
		@component('components.login', [ 'errors' => $errors] ) @endcomponent
	@else
		@component('components.navbar') @endcomponent
	@endif
@endsection

@section('mainbody')
<h1><span style="color:white">ATTENDANCE REPORT</span></h1>
<h3><span style="color:white">{{ $batch->centre->name }}</span></h3>
<br>
<div id="app">
	<div class="box">
		<attendance-report :students="{{$students}}" :attendances="{{$attendances}}"  :batch="{{$batch}}"></attendance-report>
	</div>
</div>
@endsection
