
<h1><span style="color:white">ATTENDANCES</span></h1>
<h4><span style="color:white">BATCHES</span></h4>

<div class="section"> 
	<div class="columns is-mobile is-multiline">
	@foreach ($batches as $batch) 					
		<div class="column is-one-quarter">
			<div class="box">
				<p class="title is-4" id="centre">{{$batch->name}}</p> 
				<p class="subtitle is-7" id="centre">{{$batch->centre->name}}</p> 
				<p class="title is-6" id="centre">{{$batch->time}}</p> 
				<p><a href="/attendances/batches/{{$batch->id}}/students" class="button is-warning">Today's Attendance</a></p>
				<p><a href="/attendances/batches/{{$batch->id}}" class="button is-link">Attendances</a></p>
			</div>
		</div>
	@endforeach				
	</div>
</div>
