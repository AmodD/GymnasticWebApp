<template>			
	<div>
		<form action="/attendances" method="POST" @submit="markTheAttendance()">
			<input type="hidden" name="_token" :value="csrf">
			<li v-for="student in students"> 
				<div class="card">
					<div class="card-content">	{{student.name}} 	</div>	
				</div>									
				<div name="student_id"> {{student.id}} </div>
				<button class="button is-primary" type="submit" name="attendance" value="presence" 
				@click="markPresent(student.id)" v-model="attendance">Present
			</button>
			<button class="button is-danger" type="submit" name="attendance" value="absence" 
			@click="markAbsent(student.id)" v-model="attendance">Absent
		</button>
	</li> 
</form>
</div>

</template>
<script >
	
	export default{
		props:{ students:Array, today:Object},

		data(){
			return {
				attendance:"",
				'Id':"",
				'studentId':"",
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
			}
		},
		methods: {

			markTheAttendance(){

				this.students.forEach(student=>{ 

					if(student.id==this.studentId){

						axios.post('/attendances', {
							'student_id': this.studentId,
							'day':this.today,
							'present': this.attendance,
							
						})
					}
				});
			},

			markPresent(student_id){				
				this.studentId = student_id;			
				this.attendance = true;				
			},

			markAbsent(student_id){
				this.studentId = student_id;
				this.attendance = false;
			}
		}
	}
</script>