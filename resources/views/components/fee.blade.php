
<form method="POST" action="/fees">
<div class="box">
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
	    		  <input class="input" type="text" name="amount"  value="{{$centre->fee_amount}}" readonly>
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
			</p>
			</div>
		</div>
		<div class="field is-horizontal">
			<div class="field-label is-normal"><label class="label">Period</label></div>
			<div class="field-body">
  <p class="control">
    <div class="select">
      <select name="period" required>
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
        <option value="July-September">July-September</option>
        <option value="October-December">October-December</option>
	<option value="January-March">January-March</option>
	@endif
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
					<textarea class="textarea" name="comments" placeholder="e.g. Cheque no 28826"></textarea>
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
</div>

<p class="help is-danger">{{ $errors->first('day') }}</p>
<p class="help is-danger">{{ $errors->first('month') }}</p>
<p class="help is-danger">{{ $errors->first('year') }}</p>								
<p class="help is-danger">{{ $errors->first('selected_students') }}</p>								

@if (session('fee_success'))
    <div class="help is-success">
        {{ session('fee_success') }}
    </div>
@endif

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
</script>




