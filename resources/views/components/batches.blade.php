
<h3><span style="color:white">BATCHES</span></h3>

<div class="section"> 
	<div class="columns is-mobile is-multiline">
	@foreach ($batches as $batch) 					
		<div class="column is-one-quarter">
			<div class="box">
				<p class="title is-4" id="centre"><a href="">{{$batch->name}}</a></p> 
				<p class="subtitle is-7" id="centre">{{$batch->centre->name}}</p> 
				<p class="title is-6" id="centre">{{$batch->time}}</p> 
				<p><a href="/batches/{{$batch->id}}/students" class="button is-warning">Students</a></p>
			</div>
		</div>
	@endforeach				
	</div>
</div>
