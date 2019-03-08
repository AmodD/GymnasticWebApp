@extends('layouts.app')

@section('top')
@component('components.navbar') @endcomponent
@endsection

@section('mainbody')
<form action="/students/{{$student->id}}" method="POST">
@csrf
@method('PUT')
<div class="box column is-half is-offset-one-quarter">
<h1>EDIT PROFILE</h1>

<div id="myApp" class="field is-grouped">
  <p class="control">
    <div class="select">
      <select v-model="centre" name="centre">
        <option selected value="{{ $student->batch->centre_id }}">{{ $student->batch->centre->name}}</option>
	@foreach($centres as $centre)
	<option value="{{$centre->id}}">{{$centre->name}}</option>
	@endforeach
      </select>
  </div>
  </p>
  <p class="control">
    <div class="select">
      <select name="batch_id">
        <option selected value="{{$student->batch->id}}">{{$student->batch->timeInAMPM()}} {{$student->batch->name}}</option>
	@foreach($batches as $batch)
		<option v-if="centre == {{$batch->centre_id}}" value="{{$batch->id}}">{{$batch->timeInAMPM()}} {{$batch->name}}</option>
	@endforeach
      </select>
    </div>	
   </p>
</div>


<div class="field">
  <label class="label">Name</label>
  <div class="control">
    <input class="input" type="text" name="name" value="{{$student->name}}"  placeholder="Name of Student">
  </div>
</div>

<div class="field">
  <label class="label">Parent Email</label>
  <div class="control">
    <input class="input" type="text" name="parent_email" value="{{$student->parent_email}}"   placeholder="parent@email.com">
  </div>
</div>

<div class="field">
  <label class="label">Parent Mobile</label>
  <div class="control">
    <input class="input" type="text" name="parent_mobile" value="{{$student->parent_mobile}}"   placeholder="9850400836">
  </div>
</div>

<div class="field">
  <label class="label">Date of Birth</label>
  <div class="control">
    <input class="input" type="text" name="date_of_birth"  value="{{$student->date_of_birth}}"  placeholder="YYYY-MM-DD">
  </div>
</div>

<div class="field">
  <label class="label">Date of Joining</label>
  <div class="control">
    <input class="input" type="text" name="date_of_joining"  value="{{$student->date_of_joining}}"  placeholder="YYYY-MM-DD">
  </div>
</div>

<div class="field">
 <button class="button is-link">Submit</button>
</div>

</div>
</form>

<script type="text/javascript">

var app = new Vue({
	el: '#myApp',
	data:{
		centre: '{{ $student->batch->centre_id }}'
	}	
});

</script>
@endsection

