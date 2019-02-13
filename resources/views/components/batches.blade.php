<div class="section"> 
	<div class="columns is-mobile is-multiline">
	@foreach ($batches as $batch) 					
		<div class="column is-one-quarter">
			<div class="box">
				<p class="title is-4" id="centre">{{$batch->name}}</p> 
				<p class="title is-6" id="centre">{{$batch->time}}</p> 
				<a href="/centres/{{$batch->centre_id}}/batches/{{$batch->id}}/students" class="button is-info">Students</a>
			</div>
		</div>
	@endforeach				
	</div>
</div>
