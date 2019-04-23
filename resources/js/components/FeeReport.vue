<template>
<div>
<div class="field is-horizontal">
<div class="field-body">
  <p class="control">
    <div class="select">
      <select name="periodmonths" v-model="periodmonths" required>
	<option v-if="centre.fee_frequency == 'M'" value="">Select Month</option>
        <option v-if="centre.fee_frequency == 'M'" value="January">January</option>
        <option v-if="centre.fee_frequency == 'M'" value="February">February</option>
        <option v-if="centre.fee_frequency == 'M'" value="March">March</option>
        <option v-if="centre.fee_frequency == 'M'" value="April">April</option>
        <option v-if="centre.fee_frequency == 'M'" value="May">May</option>
        <option v-if="centre.fee_frequency == 'M'" value="June">June</option>
        <option v-if="centre.fee_frequency == 'M'" value="July">July</option>
        <option v-if="centre.fee_frequency == 'M'" value="August">August</option>
        <option v-if="centre.fee_frequency == 'M'" value="September">September</option>
        <option v-if="centre.fee_frequency == 'M'" value="October">October</option>
        <option v-if="centre.fee_frequency == 'M'" value="November">November</option>
	<option v-if="centre.fee_frequency == 'M'" value="December">December</option>
	<option v-if="centre.fee_frequency == 'Q'" value="">Select Quarter</option>
        <option v-if="centre.fee_frequency == 'Q'" value="April-June">April-June</option>
        <option v-if="centre.fee_frequency == 'Q'" value="April-May-June">April-May-June</option>
        <option v-if="centre.fee_frequency == 'Q'" value="June-July-August">June-July-August</option>
        <option v-if="centre.fee_frequency == 'Q'" value="July-August-September">July-August-September</option>
        <option v-if="centre.fee_frequency == 'Q'" value="October-November-December">October-November-December</option>
	<option v-if="centre.fee_frequency == 'Q'" value="January-February-March">January-February-March</option>
      </select>
  </div>
  </p>
  <p class="control">
	<div class="select">
		<select name="periodyear" v-model="periodyear" required>
		<option value="">Select Year</option>
		<option value="2018">2018</option>
		<option value="2018-2019">2018-2019</option>
		<option value="2019">2019</option>
		<option value="2019-2020">2019-2020</option>
		<option value="2020">2020</option>
		<option value="2020-2021">2020-2021</option>
		<option value="2021">2021</option>
      		</select>
	</div>
  </p>
  &nbsp;&nbsp;<a class="button is-warning" v-on:click="generate()">Generate</a>
</div>
</div>
<div class="columns">
	<div class="column is-centred">
		<div class="box has-text-centered">
		<div v-if="fees">	
		<p><strong>Total Amount : </strong> ₹ {{ totalAmount }}</p>
		<p><strong>School Commission Percent : </strong>
			<input class="input is-small is-narrow" type="text" v-model="schoolPercent"  style="width: 50px;"> ₹ {{ schoolAmount }}
		</p>
		<hr>
		</div>	
		<table class="table is-bordered is-striped">
		      <thead>
		        <tr>
		          <th>No</th>
		          <th>Date</th>
		          <th>Receipt No</th>
		          <th>Student</th>
		          <th>Mode</th>
		          <th>Comments</th>
		          <th>Amount</th>
		        </tr>
		      </thead>
		      <tbody>
			<tr v-for="(fee,key) in fees">
			  <td>{{key}}</td> 	
			  <td>{{fee.date}}</td> 	
		          <td>{{fee.id}}</td>
			  <td><a :href="studentLink(fee.student_id)">{{fee.student.name}}</a></td>
			  <td>{{fee.mode}}</td>
			  <td>{{fee.comments}}</td>
			  <td>{{fee.amount}}</td>
		        </tr>
		      </tbody>
		</table>
		</div>
	</div>
</div>
</div>
</template>

<script>
    export default {
	props: ['centre'],    
	data : function() {
		return {
			amount: '',
			periodmonths: '',
			periodyear: '',
			fees : '',
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
	generate(){

		this.amountTotal = 0;
		this.totalA = [];
		axios.get('/fees/centres/' + this.centre.id + '/reports/period' + '?period='+this.periodMonthYear)
			.then(response => this.fees = response.data)
			.catch(function (error) {
			    console.log(error);
			  });

	},	
	setamount(fee_amnt){
		// ""..split(",").length gives u number of dashes plus 1
		// which actually is the number of months 
		this.amount = fee_amnt * this.periodmonths.split("-").length;
//https://stackoverflow.com/questions/881085/count-the-number-of-occurrences-of-a-character-in-a-string-in-javascript
	}
	},
	computed: {
	    schoolAmount: function () {
		    return (this.totalAmount * this.schoolPercent ) / 100;
	    },
	    totalAmount: function () {

		    let self = this;
		    let total = 0;
                    this.totalA = [];

		    Object.entries(this.fees).forEach(([key, val]) => {
		      self.totalA.push(Number(val.amount)) // the value of the current key.
		  });
//		return total;
		  return self.totalA.reduce(function(total, value){ return total +  value }, 0);
	    },
	    periodMonthYear: function () {
	      return this.periodmonths + ' ' + this.periodyear ; 
	    }
  }
    }
</script>
