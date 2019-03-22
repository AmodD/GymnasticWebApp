
<form method="POST" action="/fees">
<div id="myApp" class="box">
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
			<label class="radio"><input type="radio" name="mode" value="CHEQ"> Cheque</label>
			<label class="radio"><input type="radio" name="mode" value="ONLT"> Online</label>
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
		  	<p class="control"><button id="paid" class="button is-primary">Pay Fees & Send Receipts</button></p>
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

</div>


	<div class="column">
       <table class="table is-striped">
        <thead>
          <tr>
            <th><input type="checkbox" onClick="toggle(this)"></th>
	    <th>All</th>
          </tr>
        </thead>
        <tbody>
	@foreach($centre->students as $student)
	<tr>
	  <td><input name="selected_students[]" id="student_{{$student->id}}" value="{{$student->id}}"  type="checkbox"></td>
          <td><a href="/students/{{$student->id}}">{{$student->name}}</a></td>
	</tr>
	@endforeach
        </tbody>
       </table>
	</div>

<input type="hidden" name="period" v-model="periodMonthYear">

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




