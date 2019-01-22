<template>			
		<div>
<li v-for="student in students"> 
	<div class="card">
		<div class="card-content">	{{student.name}} </div>		
	</div>
	<form action="/attendances" method="POST">
						{{csrf_field()}}
		<button class="button is-primary" type="submit" name="attendance" value=true>Present</button>
		<button  class="button is-danger" type="submit" name="attendance" value=false>Absent</button>
	</form>
</li> 
</div>
						
</template>
<script >
	
	export default{
		props:{
			students:Array,

		},
	}
</script>