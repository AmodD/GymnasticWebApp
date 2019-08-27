<template>
<div>
<div class="field is-horizontal">
<div class="field-body">
  <p class="control">
    <div class="select">
      <select name="periodmonths" v-model="periodmonths" required>
	<option value="">Select Month</option>
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
	<option value="12">December</option>
        <option v-if="false" value="January">January</option>
        <option v-if="false"  value="February">February</option>
        <option v-if="false"  value="March">March</option>
        <option v-if="false"  value="April">April</option>
        <option v-if="false"  value="May">May</option>
        <option v-if="false"  value="June">June</option>
        <option v-if="false"  value="July">July</option>
        <option v-if="false"  value="August">August</option>
        <option v-if="false"  value="September">September</option>
        <option v-if="false"  value="October">October</option>
        <option v-if="false"  value="November">November</option>
	<option v-if="false"  value="December">December</option>
      </select>
  </div>
  </p>
  <p class="control">
	<div class="select">
		<select name="periodyear" v-model="periodyear" required>
		<option value="">Select Year</option>
		<option value="2018">2018</option>
		<option value="2019">2019</option>
		<option value="2020">2020</option>
		<option value="2021">2021</option>
      		</select>
	</div>
  </p>
  <!--
  &nbsp;&nbsp;<a class="button is-warning" v-on:click="generate()">Generate</a>
  &nbsp;&nbsp;<button onClick="javascript: window.print();return false;" class="button is-info is-pulled-right">
			<span class="icon"><i class="fas fa-print"></i></span>
	      </button>
 -->	      
</div>
</div>
		<div v-if="periodmonths && periodyear" class="table-container has-text-centered">
		<h3>Attendance Report for {{ periodMonthYear }}</h3>
		<hr>
		<table class="table is-bordered is-striped is-narrow">
		      <thead>
		        <tr>
		          <th>Student Name</th>
			  <th v-for="n in 31">{{n}}</th>
		        </tr>
		      </thead>
		      <tbody>
			<tr v-for="student in students">
				<td><a :href="studentLink(student.id)">{{student.name}}</a></td>
				<td v-for="n in 31" ><span v-html="getStudentPresentAbsent(student,n) "></span></td>
			</tr>	      
		      </tbody>
		</table>

		<button onClick="javascript: window.print();return false;" class="button is-info is-pulled-right">
			<span class="icon"><i class="fas fa-print"></i></span>
		</button>
		<button onClick="javascript: window.download();return false;" class="button is-info is-pulled-right">
			<span class="icon"><i class="fas fa-download"></i></span>
		</button>
		</div>
	</div>
</template>

<script>
    export default {
	props: ['students','batch','attendances'],    
	data : function() {
		return {
			amount: '',
			periodmonths: '',
			periodyear: '',
		//	attendances : [],
			amountTotal: '',
			counter: 0,
			totalA: [],
			schoolPercent: ''
		}
	},	
	methods : {
	studentLink(id){
		return "/students/" + id;
	},
	generateReport(){

	},
	getStudentPresentAbsent(student,dayNumber){
		   //const date = new Date(this.periodyear, this.periodmonths - 1, dayNumber);  // 2009-11-10
		   const date = this.periodyear + '-' +  (this.periodmonths).toString().padStart(2, '0') + '-' +  dayNumber.toString().padStart(2, '0');  // 2009-11-10

     		   let present =  _.findIndex(this.attendances, function(a) { 
			   return ( a.student_id == student.id ) && ( date == a.date ) && (a.present == "1");
		   }) >= 0;
     		   
		   let absent =  _.findIndex(this.attendances, function(a) { 
			   return ( a.student_id == student.id ) && ( date == a.date ) && (a.present == "0");
		   }) >= 0;
 				
		   if(present) return '<span class="icon has-text-success "><i class="fas fa-check"></i></span>';
		   else if(absent) return '<span class="icon has-text-danger "><i class="fas fa-times"></i></span>';
		   //else return '<span class="icon has-text-danger "><i class="fas fa-times"></i></span>';
		   else return "";
		 
	},
	generate(){

		this.amountTotal = 0;
		this.totalA = [];
		axios.get('/attendances/batches/' + this.batch.id + '/dates' + '?year='+this.periodyear + '&month='+this.periodmonths)
			.then(response => this.attendances = response.data)
			.catch(function (error) {
			    console.log(error);
			  });

	},	
	getStudentAttendance(student,date){
		   //return "ok";
     		   let present =  _.findIndex(this.attendances, function(a) { 
			   return ( a.student_id == student.id ) && ( date == a.date.substring(8) );
		   }) >= 0;
 				
		   if(present) return '<span class="icon has-text-success "><i class="fas fa-check"></i></span>';
		   //else return '<span class="icon has-text-danger "><i class="fas fa-times"></i></span>';
		   else return "";
		 
	},
	},
	computed: {
	    attendance: function (n) {
		return "Yo" + n;
	    },
	    periodMonthYear: function () {
		const date = new Date(2019, this.periodmonths - 1, 10);  // 2009-11-10
		const month = date.toLocaleString('default', { month: 'long' });

	      //return this.periodmonths + ' ' + this.periodyear ;
	      if(this.periodyear) return month + ' ' + this.periodyear ; 
	      else return "";
	    }
  }
    }
</script>
