
<h1><span style="color:white">FEES</span></h1>
<h4><span style="color:white">CENTRES</span></h4>
<div class="section"> 
	<div class="columns is-mobile is-multiline">
	@foreach ($centres as $centre) 	
		<div class="column is-one-quarter">	
			<div class="box">
				<p class="title is-4" id="centre">{{$centre->name}}</p> 
				<p class="title is-6" id="centre">{{$centre->address}}</p> 
				<a href="/fees/centres/{{$centre->id}}" class="button is-warning">Fees & Receipts</a>
			</div>
		</div>
	@endforeach				
	</div>
</div>
