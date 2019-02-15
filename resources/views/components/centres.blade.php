
<h3><span style="color:white">CENTRES</span></h3>
<div class="section"> 
	<div class="columns is-mobile is-multiline">
	@foreach ($centres as $centre) 	
		<div class="column is-one-quarter">	
			<div class="box">
				<p class="title is-4" id="centre"><a href="">{{$centre->name}}</a></p> 
				<p class="title is-6" id="centre">{{$centre->address}}</p> 
				<a href="/centres/{{$centre->id}}/batches" class="button is-warning">Batches</a>
			</div>
		</div>
	@endforeach				
	</div>
</div>
