@extends('layouts.app')

@section('top')

	@if(Auth::guest())
		@component('components.login', [ 'errors' => $errors] ) @endcomponent
	@else
		@component('components.navbar') @endcomponent
	@endif

@endsection

@section('mainbody')
<div class="box">
<nav class="level">
  <div class="level-item">
    <div>
	<h4><span style="color:red;">ID:<span> {{$student->id}}</h4>
    </div>
  </div>
  <div class="level-item">
    <div>
	<h1>{{$student->name}}</h1>
    </div>
  </div>
  <div class="level-item">
    <div>
	<h3>{{$student->batch->centre->name}}</h3>
    </div>
  </div>
  <div class="level-item">
    <div>
	<h5>{{$student->batch->name}} {{$student->batch->timeInAMPM()}}</h5>
    </div>
  </div>
  <div class="level-right">
    <div><p>
	<form action="/students/{{$student->id}}" method="POST">
  		<button onClick="javascript: window.print();return false;" class="button is-info is-small">
			<span class="icon"><i class="fas fa-print"></i></span>
	        </button>
		&nbsp;
		<a class="button is-warning is-small" href="/students/{{$student->id}}/edit">
			<span class="icon is-small"><i class="fas fa-edit"></i></span>
		</a>
		&nbsp;
		@method('DELETE')
	        @csrf
		<button onClick="javascript: return confirm('Please confirm deletion');" class="button is-danger is-small">
			<span class="icon is-small"><i class="fas fa-times"></i></span>
		</button>
	</form>
</p>
    </div>
</nav>
<nav class="level">
  <div class="level-item">
    <div>
	<p><strong>Date of Birth</strong> : {{$student->date_of_birth}} </p>	
    </div>
  </div>
  <div class="level-item">
    <div>
	<p><strong>Date of Joining</strong> : {{$student->date_of_joining}}  </p>	
    </div>
  </div>
  <div class="level-item">
    <div>
	<p><strong>Parent Email</strong> : {{$student->parent_email}}  </p>	
    </div>
  </div>
  <div class="level-item">
    <div>
	<p><strong>Parent Mobile</strong> : {{$student->parent_mobile}}  </p>	
    </div>
  </div>
</nav>
</div>

<div class="box">
      <p class="title">Fee</p>
	@component('components.fee_form',["student" => $student]) @endcomponent
	@component('components.fee_history',["student" => $student]) @endcomponent
</div>

<div class="box">
      <p class="title">Attendance</p>
	@foreach($student->attendances->sortByDesc('id') as $attendance)
		@if($attendance->present)<span class="tag is-success">P</span>
		@else <span class="tag is-text">A</span>
		@endif
	@endforeach
</div>
@endsection


