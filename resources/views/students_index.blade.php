@extends('layouts.app')

@section('top')

	@if(Auth::guest())
		@component('components.login', [ 'errors' => $errors] ) @endcomponent
	@else
		@component('components.navbar') @endcomponent
	@endif

@endsection

@section('mainbody')
<div class="field"><a class="button is-success" href="/students/create">Add Students</a></div>
<div id="app">
<students :centres="{{$centres}}" :batches="{{$batches}}" :students="{{$students}}"></students>
</div>
@endsection


