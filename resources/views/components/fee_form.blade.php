<div id="myApp">
<form method="POST" action="/fees">
@csrf
<input type=hidden name="student_id" value="{{$student->id}}">
<input type="hidden" name="students" value="0">
<input type="hidden" name="period" v-model="periodMonthYear">
<div class="field has-addons">
  @component('components.date') @endcomponent
  <p class="control has-icons-left">
    <input class="input" type="text" name="amount" v-model="amount" placeholder="{{$student->batch->centre->fee_amount}}"  readonly>
    <span class="icon is-small is-left"><i class="fas fa-rupee-sign"></i></span>
  </p>
  <p class="control"><button id="paid" class="button is-primary">Pay</button></p>
</div>
<div class="field is-grouped">
	<p class="control">
		<label class="radio"><input type="radio" name="mode" value="CASH" checked> Cash</label>
		<label class="radio"><input type="radio" name="mode" value="CHEQUE"> Cheque</label>
		<label class="radio"><input type="radio" name="mode" value="ONLINE"> Online</label>
	</p>
	<p class="control">
		<input class="input is-link" name="comments" placeholder="Comments"></input>
	</p>
  <p class="control">
    <div class="select">
      <select name="periodmonths" v-on:change="setamount({{$student->batch->centre->fee_amount}})" v-model="periodmonths" required>
	@if($student->batch->centre->fee_frequency == 'M')
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
	@if($student->batch->centre->fee_frequency == 'Q')
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
</form>
</div>

<p class="help is-danger">{{ $errors->first('day') }}</p>
<p class="help is-danger">{{ $errors->first('month') }}</p>
<p class="help is-danger">{{ $errors->first('year') }}</p>								

@if (session('fee_success'))
    <div class="help is-success">
        {{ session('fee_success') }}
    </div>
@endif

<script language="JavaScript">

var app = new Vue({
	el: '#myApp',
	data:{
		amount: '',
		periodmonths: '',
		periodyear: '',
	},	
	methods : {
	setamount(fee_amnt){
		// ""..split(",").length gives u number of dashes plus 1
		// which actually is the number of months 
		this.amount = fee_amnt * this.periodmonths.split("-").length;
//https://stackoverflow.com/questions/881085/count-the-number-of-occurrences-of-a-character-in-a-string-in-javascript
	}
	},
	computed: {
	    periodMonthYear: function () {
	      return this.periodmonths + ' ' + this.periodyear ; 
	    }
  }
});


</script>

