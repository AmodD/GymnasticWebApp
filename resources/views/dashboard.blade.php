@extends('layouts.app')

@section('top')
	@if(Auth::guest())
		@component('components.login', [ 'errors' => $errors] ) @endcomponent
	@else
		@component('components.navbar') @endcomponent
	@endif
@endsection

@section('mainbody')
<h1><span style="color:white">DASHBOARD</span></h1>
<br><br>
<div class="columns">
@foreach($centres as $centre)
<div class="column is-half">
<div class="box"><span class="title">{{ $centre->name }}</span>&nbsp;&nbsp;<span class="subtitle">{{ $centre->address }}</span>
<hr>
	@foreach($centre->batches as $batch)
	<div class="box"><span class="title">{{ $batch->time }}</span>&nbsp;&nbsp;<span class="subtitle">{{ $batch->name }}</span></div>
	@endforeach
</div>
</div>
@endforeach
</div>
@endsection
