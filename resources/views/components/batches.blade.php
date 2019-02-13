	<div class="section"> 
		<div class="columns is-mobile is-multiline 	is-centered">
			<div class="card-content">
				@foreach ($batches as $batch) 	
				<form action="/batches/{{$batch->id}}/students" method="GET">

			<div class="column is-narrow">	
				<!-- <div class="card"> -->
					<!-- <a href = "/students" class="card has-text-dark"> -->
						<p class="card-content"> 
						 <button  class="button is-info" type="submit" name="submit">  
						 	{{$batch->name}}  {{$batch->time}} </button>
						</p>
						<input type="hidden" name="batchname" value="{{$batch->name}}">
						<input type="hidden" name="batchId" value="{{$batch->id}}">
						<!-- <button type="submit" name="submit" class="button is-info">Submit </button> -->
				<!-- </div>		  -->
					<!-- </a> -->
					
			</div>
		</form>
			@endforeach				
		</div>
		</div>
	</div>
