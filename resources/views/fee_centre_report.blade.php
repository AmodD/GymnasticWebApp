@extends('layouts.app')

@section('top')
	@if(Auth::guest())
		@component('components.login', [ 'errors' => $errors] ) @endcomponent
	@else
		@component('components.navbar') @endcomponent
	@endif
@endsection

@section('mainbody')
<h1><span style="color:white">FEE REPORT</span></h1>
<h3><span style="color:white">{{ $centre->name }}</span></h3>
<br>
<div id="app">
<fee-report :centre="{{ $centre }}" ></fee-report>
</div>

<script type="text/javascript">

var app = new Vue({
el: '#myApp',
});
</script>
@endsection
