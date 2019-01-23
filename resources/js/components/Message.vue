<template>			

	<div>
		<li v-for="student in students"> 

		<form @submit.prevent="markTheAttendance()">

			<input type="hidden" name="_token" :value="csrf">

				<div class="card"> 
					<div class="card-content"> {{student.name}} </div>	

					<div v-if="student.id==student_id" class="has-text-dark" type="" id="message" 
						 name="message"  v-model="message"> <h6> {{message}} </h6>				 
					</div>	
						
				</div>	

				<input type="hidden" id="student_id" name="student_id"  v-model="student_id">
				<input type="hidden" id="date"       name="date"        v-model="date"> 
				<input type="hidden" id="present" name="present"  v-model="present"> 

				<button class="button is-primary" type="submit"	@click="markPresent(student.id)" >Present 
				</button>
			
				<button class="button is-danger" type="submit" @click="markAbsent(student.id)" >Absent   
				</button>

				<!-- <button class="button is-primary" type="submit" name="attendance" value="presence" 
				@click="markPresent(student.id)" v-model="attendance">Present </button>
			
				<button class="button is-danger" type="submit" name="attendance" value="absence" 
				@click="markAbsent(student.id)" v-model="attendance">Absent   </button> -->
			 
				
		</form>
	</li>	
	</div>

</template>
<script >
	
	export default{

		props:{ students:Array, today:String},

		data(){
			return {
				'present':"",
				'student_id':"",
				'date':"",
				'message':"",
				'success':"",
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

						if (this.present) {this.message = "The student is marked Present";}
						else{ this.message = "The student is marked Absent";}
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