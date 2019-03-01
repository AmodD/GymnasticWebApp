
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
			<div class="field-label is-normal"><label class="label">Cash</label></div>
			<div class="field-body">
			<p class="control">
			<label class="radio"><input type="radio" name="answer"> Yes</label>
			<label class="radio"><input type="radio" name="answer"> No</label>
			</p>
			</div>
		</div>
		<div class="field is-horizontal">
			<div class="field-label is-normal"><label class="label">Comments</label></div>
			<div class="field-body">
 				<div class="field">
					<div class="control">
					<textarea class="textarea" placeholder="e.g. Cheque no 28826"></textarea>
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




