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
<br>
<div class="field">
        <a class="button is-success" href="/centres/create"><span class="icon"><i class="fas fa-plus"></i></span><span>Centre</span></a>
</div>
<div class="columns is-multiline">
@foreach($centres as $centre)
<div class="column is-half">
	<div class="box"><span class="title">{{ $centre->name }}</span>&nbsp;&nbsp;<span class="subtitle">{{ $centre->address }}</span>
		<span class="is-pulled-right">
			<form action="/centres/{{$centre->id}}" method="POST">
				<a class="button is-warning" href="/centres/{{$centre->id}}/edit">
					<span class="icon is-small"><i class="fas fa-edit"></i></span>
				</a>
				&nbsp;
				@method('DELETE')
			        @csrf
				<button onClick="javascript: return confirm('Please confirm deletion');" class="button is-danger">
					<span class="icon is-small"><i class="fas fa-times"></i></span>
				</button>
			</form>
		</span>
		<hr>
		<div class="field">
    <a class="button is-link" href="centres/{{$centre->id}}/batches/create"><span class="icon"><i class="fas fa-plus"></i></span><span>Batch</span></a>
    <a class="button is-info" href="students/create"><span class="icon"><i class="fas fa-plus"></i></span><span>Student</span></a>
		</div>
		@foreach($centre->batches->sortBy('time') as $batch)
			<div class="box has-background-light">
				<span class="title is-4">{{ $batch->timeInAMPM() }}</span>&nbsp;&nbsp;
				<span class="subtitle is-6">{{ $batch->name }}</span>
				<span class="is-pulled-right">
					<form  action="/batches/{{$batch->id}}" method="POST">
						<a class="icon  has-text-dark" href="centres/{{$centre->id}}/batches/{{$batch->id}}/edit">
							<span class="icon "><i class="fas fa-edit"></i></span>
						</a>
						&nbsp;
						@method('DELETE')
						@csrf
						<button class="delete" onClick="javascript: return confirm('Please confirm deletion');"></button>
					</form>
				</span>
			</div>
		@endforeach
	</div>
</div>
@endforeach
</div>
@endsection
