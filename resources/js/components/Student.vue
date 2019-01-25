<template>			

	<div class="card">
				 <div class="card-content">
				 	<a @click="showTodaysAttendance()"> {{studentid}}  {{studentNames}} </a> 
				 </div>
	</div>

</template>
<script >
	
	export default{

		props:{student:Object},

		data(){

			return {
				'studentNames':this.student.name,
				'studentid':this.student.id,		
				'todaysAttendance':[],
			}
		},
		methods:{

			showTodaysAttendance(){

				this.student.attendances.forEach(studentAttendance=>{
					
					
				this.todaysAttendance.push(studentAttendance['present'][0]);

			});

				alert(this.todaysAttendance[this.todaysAttendance.length-1]);
			}
		},

	
	}
</script>