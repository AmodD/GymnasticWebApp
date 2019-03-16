<form action="{{ route('login') }}" method="POST">
{{csrf_field()}}
<div class="columns">
	<div class = "column is-narrow is-4 is-offset-1">
		<div class="field" >
			<div class="control">
				<input id="email" name ="email" class="input is-primary has-text-grey" type="text" placeholder ="email">					  </div>
			<p class="help is-danger">{{ $errors->first('email') }}</p>		
		</div>
	</div>		
	<div class = "column is-narrow is-4 is-offset-0">
		<div class="field" >
			<div class="control">
				<input name ="password" type="password"id="password" class="input is-primary has-text-grey" placeholder="password">				   </div>
			<p class="help is-danger">{{ $errors->first('password') }}</p>						
		</div>
	</div>		
	<div class = "column is-narrow is-1 is-offset-0">
		<button class="button is-dark has-text-white" id="Login" name="Login" type="submit" style="margin-left: 10px">Login</button>		
	</div>
</div>	
</form>
