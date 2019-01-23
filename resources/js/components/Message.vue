<template>			
	<div>
		<form @submit="markTheAttendance()">
			<input type="hidden" name="_token" :value="csrf">
			<li v-for="student in students"> 
				<div class="card">
					<div class="card-content">	{{student.name}} </div>	
				</div>									
				<input type="hidden"  name="student_id" v-model="student_id"> 
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
		props:{ students:Array,},

		data(){
			return {
				attendance:"",
				'Id':"",
				'studentId':"",
				'student_id':"",//set this value to the selected student id through "this.studentId"
				'date':"",
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
			}
		},
		methods: {

			markTheAttendance(){

				this.students.forEach(student=>{ 

					if(student.id==this.student_id){
						
						axios.post('/attendances', {
							'student_id': this.student_id,
							'date':'1-2-3',
							'present': this.attendance,
							
						}).then(function (response) {
   							 console.log(response);
  							})
					}
				});
			},

			markPresent(id){				
				// this.studentId = id;			
				this.student_id=id;
				this.attendance = true;				
			},

			markAbsent(id){
				// this.studentId = id;
				this.student_id=id;
				this.attendance = false;
			}
		}
	}
</script>