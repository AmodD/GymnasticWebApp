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
<div id="myApp" class="columns">
	<div class="column is-centred">
		<div class="box">
		<table class="table is-bordered">
		      <thead>
		        <tr>
		          <th>Entity</th>
		          <th>Id</th>
		          <th>Name</th>
		          <th>Details</th>
		          <th>Action</th>
		        </tr>
		      </thead>
		      <tbody>
			@foreach($centresTrashed as $centre)
			<tr>
			  <td>Centre</td> 	
		          <td>{{$centre->id}}</td>
			  <td>{{$centre->name}}</td>
			  <td></td>
		          <td><a href="#" class="button is-link" @click="showModal = true;entity = 'centre', entityObj = {{ $centre }} ">activate</a></td>
		        </tr>
			@endforeach
			@foreach($batchesTrashed as $batch)
			<tr>
			  <td>Batch</td> 	
		          <td>{{$batch->id}}</td>
			  <td>{{$batch->timeInAMPM()}} {{$batch->name}}</td>
			  <td>centre id : {{$batch->centre_id}}</td>
		          <td><a href="#" class="button is-link" @click="showModal = true;entity = 'batch', entityObj = {{ $batch }} ">activate</a></td>
		        </tr>
			@endforeach
			@foreach($studentsTrashed as $student)
			<tr>
			  <td>Student</td> 	
		          <td>{{$student->id}}</td>
			  <td>{{$student->name}}</td>
			  <td>batch id : {{$student->batch_id}}</td>
		          <td><a href="#" class="button is-link" @click="showModal = true;entity = 'student',entityObj = {{$student}}">activate</a></td>
		        </tr>
			@endforeach
		      </tbody>
		</table>
		</div>
	</div>



<div v-if="showModal" class="modal is-active">
<form action="/archives" method="POST">
@csrf
<input type=hidden name="id" v-model="entityObj.id">
<input type=hidden name="entity" v-model="entity">
  <div class="modal-background"></div>
 <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Activate</p>
    </header>
    <section class="modal-card-body">
	<div class="field">
	  <div class="control">
	    <input class="input is-info" type="text" v-model="entityObj.name" readonly>
	  </div>
	</div>
	<div  class="field is-grouped">
  <p class="control">
    <div class="select" v-if="entity == 'batch' || entity == 'student'">
      <select v-model="centre" name="centre" required>
        <option value="">Select Centre</option>
	@foreach($centresActive as $centre)
	<option value="{{$centre->id}}">{{$centre->name}}</option>
	@endforeach
      </select>
  </div>
  </p>
  <p class="control">
    <div class="select" v-if="entity == 'student'">
      <select v-model="batch" name="batch" required>
        <option value="">Select Batch</option>
	@foreach($batchesActive->sortBy('time') as $batch)
		<option v-if="centre == {{$batch->centre_id}}" value="{{$batch->id}}">{{$batch->timeInAMPM()}} {{$batch->name}}</option>
	@endforeach
      </select>
    </div>	
   </p>
  </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-link">Re-Activate</button>
      <a href="/archives" class="button">Cancel</a>
    </footer>
  </div>
</form>
</div>


</div>
<script type="text/javascript">

var app = new Vue({
	el: '#myApp',
	data:{
		centre: '',
		batch: '',
		showModal: false,
		entity: '',
		entityObj: Object,
	}	
});

</script>
@endsection
