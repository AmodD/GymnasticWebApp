@extends('layouts.app')

@section('top')
	@if(Auth::guest())
		@component('components.login', [ 'errors' => $errors] ) @endcomponent
	@else
		@component('components.navbar') @endcomponent
	@endif
@endsection

@section('mainbody')
<h1><span style="color:white">ARCHIVES</span></h1>
<div class="columns">
	<div class="column is-centred">
		<div id="app" class="box">
			<archives :centres="{{$centresTrashed}}" :batches="{{$batchesTrashed}}" :students="{{$studentsTrashed}}"
				  :centresactive="{{$centresActive}}" :batchesactive="{{$batchesActive}}">
				<template slot="csrf-field">
				{{ csrf_field() }}
				</template>
			</archives>
		</div>
	</div>
</div>
@endsection
