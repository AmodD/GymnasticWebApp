<template>			

	<div>
		<li v-for="studentwa in studentswa"> 
			 
			
			<form @submit.prevent="markTheAttendance()">
				<input type="hidden" name="_token" :value="csrf">
				<div class="card"> 
					<div class="card-content"> {{studentwa.name}} <br> {{studentwa.attendances[0].present}}</div>
					<div v-if="studentwa.id==student_id" v-show="success" class="has-text-dark" type="" id="message" 
					name="message"  v-model="message"> <h6> {{message}} </h6>

				</div>					
			</div>	

			<input type="hidden" id="student_id" name="student_id"  v-model="student_id">
			<input type="hidden" id="date"       name="date"        v-model="date"> 
			<input type="hidden" id="present"    name="present"  v-model="present"> 

			<button class="button is-primary" type="submit"	@click="markPresent(student.id)" >Present 
			</button>			
			<button class="button is-danger" type="submit" @click="markAbsent(student.id)" >Absent   
			</button>
		</form>
	</li>	
</div>

</template>
<script >
	
	export default{

		props:{  students:Array, today:String},

		data(){
			return {
				'present':"",
				'student_id':"",
				'date':"",
				'message':"",
				'success':false,
				'studentswa' : this.students,
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
			}
		},
		methods: {

			markTheAttendance(){
				this.students.forEach(student=>{ 

					if(student.id==this.student_id){

						axios.post('/attendances', {

							'student_id': this.student_id,
							'date':this.date,
							'present': this.present,

						}).then((response)=>{console.log(response);});						
							
						if (this.present=="present") {this.message = "The student is marked Present";}
						else{ this.message = "The student is marked Absent";}
						this.success = true;
					}
				});
			},

			markPresent(id){
				this.date=this.today;
				this.student_id = id;			
				this.present = "present";	
			},

			markAbsent(id){
				this.date=this.today;
				this.student_id = id;			
				this.present = "absent";
			}
		}
	}
</script>