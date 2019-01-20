@if ($errors->any())
<div class="">
	<!-- @foreach ($errors->all() as $error) -->
	<div>
		<!-- <div class="section"> -->
			<!-- <div class="columns">	
				<div class="column is-half">	 -->	
					<!-- <div class="card-content"> -->
						<!-- <div class="content"> -->
							<!-- <article class="message is-danger"> -->
							<!-- 
								<div class="message-header is-small">
									<p>Error</p>
								</div> -->
								<div class="has-text-danger">
								 <p class="help is-danger">	
									  						
										{{ $error }}	
										</p>								
								</div>

								

							<!-- </div> -->
							<!-- </article> -->
							<!-- </div> -->
					<!-- 	</div>
					</div> -->
				<!-- </div> -->
			</div>
			<!-- @endforeach		 -->
		</div>
		@endif                   			

