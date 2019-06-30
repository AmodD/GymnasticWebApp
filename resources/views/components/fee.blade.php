
<form method="POST" action="/fees">
<div id="myApp"  class="box">
<h3 class="has-text-centered">{{$centre->name}}</h3>
<br>
<div class="columns">
@csrf
	<div class="column is-half">
		<input type="hidden" name="students" value="1">
		<div class="field is-horizontal">
			<div class="field-label is-normal"><label class="label">Date</label></div>
			<div class="field-body"> @component('components.date') @endcomponent </div>
		</div>
		<div class="field is-horizontal">
			<div class="field-label is-normal"><label class="label">Amount</label></div>
			<div class="field-body">
			  <p class="control has-icons-left">
	    		  <input class="input" type="text" name="amount" v-model="amount" placeholder="{{$centre->fee_amount}}"  readonly>
			  <span class="icon is-small is-left"><i class="fas fa-rupee-sign"></i></span>
			  </p>
			</div>
		</div>
		<div class="field is-horizontal">
			<div class="field-label is-normal"><label class="label">Mode</label></div>
			<div class="field-body">
			<p class="control">
			<label class="radio"><input type="radio" name="mode" value="CASH" checked> Cash</label>
			<label class="radio"><input type="radio" name="mode" value="CHEQUE"> Cheque</label>
			<label class="radio"><input type="radio" name="mode" value="ONLINE"> Online</label>
			</p>
			</div>
		</div>
		<div class="field is-horizontal">
			<div class="field-label is-normal"><label class="label">Period</label></div>
			<div class="field-body">
  <p class="control">
    <div class="select">
      <select name="periodmonths" v-on:change="setamount({{$centre->fee_amount}})" v-model="periodmonths" required>
	@if($centre->fee_frequency == 'M')
	<option value="">Select Month</option>
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
	<option value="December">December</option>
	@endif
	@if($centre->fee_frequency == 'Q')
	<option value="">Select Quarter</option>
        <option value="April-June">April-June</option>
        <option value="April-May-June">April-May-June</option>
        <option value="June-July-August">June-July-August</option>
        <option value="July-August-September">July-August-September</option>
        <option value="October-November-December">October-November-December</option>
	<option value="January-February-March">January-February-March</option>
	@endif
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
			</div>
		</div>
		<div class="field is-horizontal">
			<div class="field-label is-normal"><label class="label">Comments</label></div>
			<div class="field-body">
 				<div class="field">
					<div class="control">
					<textarea class="textarea" name="comments" placeholder="e.g. Cheque no 28826 , Online Transfer Ref No 57affarfr#45d5svy6"></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="field is-horizontal">
			<div class="field-label">
    			<!-- Left empty for spacing -->
			</div>
			<div class="field-body">
		  	<p class="control"><button id="paid" class="button is-warning">Pay Fees & Send Receipts</button></p>
			</div>
		</div>

<div class="field is-horizontal">
<p class="help is-danger">{{ $errors->first('day') }}</p>
<p class="help is-danger">{{ $errors->first('month') }}</p>
<p class="help is-danger">{{ $errors->first('year') }}</p>								
<p class="help is-danger">{{ $errors->first('selected_students') }}</p>								
@if (session('fee_success'))
    <div class="help is-success">
        {{ session('fee_success') }}
    </div>
@endif
</div>

<input type="hidden" name="period" v-model="periodMonthYear">
</div>


	<div class="column">
       <table class="table is-striped">
	<thead>
	  <tr>
	    <th></th>	
	    <th><input class="input is-warning" type="text" placeholder="Search..." v-model="search" style="width: 250px;"></th>
	  </tr>
          <tr v-if="!search">
            <th><input type="checkbox" onClick="toggle(this)"></th>
	    <th>All</th>
          </tr>
        </thead>
        <tbody>
	<tr v-for="student in filteredList">
	  <td v-if="feePaidStatus(student.fees)"><input name="selected_students[]" :id="studentID(student.id)" :value="student.id"  type="checkbox" disabled></td>
	  <td v-else><input name="selected_students[]" :id="studentID(student.id)" :value="student.id"  type="checkbox"></td>
	  <td><a :href="studentLink(student.id)" v-text="student.name"></a></td>
	  <td v-html="testmethod(student.fees)"></td>
	</tr>
        </tbody>
       </table>
        </div>


</div>
</form>
</div>

<script language="JavaScript">

function toggle(source) {
  checkboxes = document.getElementsByName('selected_students[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}

var app = new Vue({
	el: '#myApp',
	data:{
		amount: '',
		periodmonths: '',
		periodyear: '',
		students: [],
		centre:'{{$centre->id}}',
		search: ''
	},	
        mounted() {
	console.log("before");
	this.getStudents();
		console.log("after");
        },
	methods : {
	removeSelection(){
	},
	studentLink(id){
		return "/students/" + id;
	},
	studentID(id){
		return "students_" + id;
	},
	feePaidStatus(fees){
		let self = this;
		if(this.periodMonthYear == '') return false;
		else if(fees.filter(function(fee) { return fee.period == self.periodMonthYear; }).length > 0) return true;
		else return false;
	},
	testmethod(fees){
	//return fees;
	let self = this;
	if(this.periodMonthYear == '') return "";
	else if(fees.filter(function(fee) { return fee.period == self.periodMonthYear; }).length > 0) return "<span class='tag is-rounded is-success'>PAID</span>";
	else return "<span class='tag is-rounded is-danger'>UNPAID</span>";
	//return "HEER" + a;
	},
	getStudents(){
		axios.get('/getstudentsforfees', {
    			params: {
			      period: this.periodMonthYear,
			      centre: this.centre,
			    }
			  })
			.then(response => this.students = response.data)
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
	    testComputed: function () {
	      return "abc"; 
	    },
	    filteredList() {

	      //if(!Array.isArray(students)) return students ;
		
	      return this.students.filter(student => {
        	return student.name.toLowerCase().includes(this.search.toLowerCase()) || 
		       student.parent_email.toLowerCase().includes(this.search.toLowerCase()) ||
		       student.parent_mobile.toLowerCase().includes(this.search.toLowerCase())
	      })
	    },
	    periodMonthYear: function () {
		if(this.periodmonths == '' || this.periodyear == '') return '';    
		else return this.periodmonths + ' ' + this.periodyear ; 
	    }
  }
});


</script>




