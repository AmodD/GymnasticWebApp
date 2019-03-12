<form method="POST" action="/fees">
@csrf
<input type=hidden name="student_id" value="{{$student->id}}">
<input type="hidden" name="students" value="0">
<div class="field has-addons">
  @component('components.date') @endcomponent
  <p class="control has-icons-left">
    <input class="input" type="text" name="amount"  value="{{$student->batch->centre->fee_amount}}" readonly>
    <span class="icon is-small is-left"><i class="fas fa-rupee-sign"></i></span>
  </p>
  <p class="control"><button id="paid" class="button is-primary">Paid</button></p>
</div>
<div class="field is-grouped">
	<p class="control">
		<label class="radio"><input type="radio" name="mode" value="CASH" checked> Cash</label>
		<label class="radio"><input type="radio" name="mode" value="CHEQ"> Cheque</label>
	</p>
	<p class="control">
		<input class="input is-link" name="comments" placeholder="Comments"></input>
	</p>
  <p class="control">
    <div class="select">
      <select name="period" required>
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
        <option value="July-September">July-September</option>
        <option value="October-December">October-December</option>
	<option value="January-March">January-March</option>
	@endif
      </select>
  </div>
  </p>
</div>
</form>

<p class="help is-danger">{{ $errors->first('day') }}</p>
<p class="help is-danger">{{ $errors->first('month') }}</p>
<p class="help is-danger">{{ $errors->first('year') }}</p>								

@if (session('fee_success'))
    <div class="help is-success">
        {{ session('fee_success') }}
    </div>
@endif
