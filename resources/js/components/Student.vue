<template>			
		<form @submit.prevent="markTheAttendance()">
			<input type="hidden" name="_token" :value="csrf">

			<p class="title is-4" id="centre">{{studentName}}</p> 
			<p class="title is-4" id="centre">{{student_attendance}}</p> 
				
			<div v-if="studentid==student_id" v-show="success" class="has-text-dark" type="" id="message" name="message"  v-model="message">
			       	<h6> {{message}} </h6>
			</div>	

			<input type="hidden" id="student_id" name="student_id"  v-model="student_id">
			<input type="hidden" id="date"       name="date"        v-model="date"> 
			<input type="hidden" id="present"    name="present"  v-model="present"> 

			<button class="button is-primary" type="submit"	@click="markPresent(studentid)">Present</button>			
			<button class="button is-danger" type="submit" @click="markAbsent(studentid)">Absent</button>
			<button class="button is-danger" type="submit" @click="showStudentsForTheSelectedBatch(student_batch)" >batch 	</button>
		</form>

</template>
<script >

	export default{

		props:{student:Object, attendance:Number},

		data(){

			return {
				'studentName':this.student.name,
				'studentid':this.student.id,
				'student_batch':this.student.batch_id,		
				'todaysAttendance':[],
				'student_id':"",
				'date':"",
				'present':"",
				'success':false,
				'message':"",
				'student_attendance':this.attendance,
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
			}
		},
		methods:{

			showTodaysAttendance(){

					alert(this.student_attendance);

				this.student.attendances.forEach(studentAttendance=>{

					this.todaysAttendance.push(studentAttendance['present'][0]);

				});

				alert(this.todaysAttendance[this.todaysAttendance.length-1]);
			},

			showStudentsForTheSelectedBatch(id){
				alert(id);

			},
			markTheAttendance(){ },
			markPresent(){},
			markAbsent(){},
		},


	}
</script>
