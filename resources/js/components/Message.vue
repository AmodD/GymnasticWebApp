<template>			

	<div>
		<form action="/attendances" method="POST" @submit="markTheAttendance()">

			<input type="hidden" name="_token" :value="csrf">

			<li v-for="student in students"> 

				<div class="card"> <div class="card-content"> {{student.name}} </div>	</div>		

				<input type="hidden" id="student_id" name="student_id" v-model="student_id">

				<input type="hidden" id="date" name="date"  v-model="date"> 
				<span class="has-text-white"> {{date}}</span>

				<button class="button is-primary" type="submit" name="attendance" value="presence" 
				@click="markPresent(student.id)" v-model="attendance">Present </button>
			
				<button class="button is-danger" type="submit" name="attendance" value="absence" 
				@click="markAbsent(student.id)" v-model="attendance">Absent   </button>
			</li> 

		</form>
	</div>

</template>
<script >
	
	export default{
		props:{ students:Array, today:String},

		data(){
			return {
				attendance:"",
				'Id':"",
				'studentId':"",
				'student_id':"",
				'date':"",
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
			}
		},
		methods: {

			markTheAttendance(){
				this.students.forEach(student=>{ 

					if(student.id==this.studentId){

						axios.post('/attendances', {
							'student_id': this.student_id,
							'date':this.today,
							'present': this.attendance,
							
						})
					}
				});
			},

			markPresent(id){
				this.date=this.today;
				this.student_id = id;			
				this.attendance = true;				
			},

			markAbsent(id){
				this.date=this.today;
				this.student_id = id;			
				this.attendance = false;
			}
		}
	}
</script>