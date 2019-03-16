
<form method="POST" action="/attendances">
<div class="box">
<div class="columns">
	@csrf
	<div class="column is-half">
	<input type="hidden" name="students" value="1">
		<div class="field is-horizontal">
			<div class="field-body"> @component('components.date') @endcomponent </div>
		</div>
		<div class="field is-horizontal">
			<div class="field-body">
	<p class="control">	
		<button type="submit" name="present" value="1" class="button is-primary">Present</button>	
		<button type="submit" name="present" value="0" class="button is-danger">Absent</button>
	</p>
			</div>
		</div>

<p class="help is-danger">{{ $errors->first('day') }}</p>
<p class="help is-danger">{{ $errors->first('month') }}</p>
<p class="help is-danger">{{ $errors->first('year') }}</p>								
<p class="help is-danger">{{ $errors->first('selected_students') }}</p>								

@if (session('attendance_success'))
    <div class="help is-success">
        {{ session('attendance_success') }}
    </div>
@endif
	</div>
	<div class="column is-half">
       <table class="table is-striped">
        <thead>
          <tr>
            <th><input type="checkbox" onClick="toggle(this)"></th>
	    <th>All</th>
          </tr>
        </thead>
        <tbody>
	@foreach($batch->students as $student)
	<tr>
	  <td><input name="selected_students[]" id="student_{{$student->id}}" value="{{$student->id}}"  type="checkbox"></td>
          <td><a href="/students/{{$student->id}}">{{$student->name}}</a></td>
	</tr>
	@endforeach
        </tbody>
       </table>
	</div>
</div>
</div>
</form>

<script language="JavaScript">

function toggle(source) {
  checkboxes = document.getElementsByName('selected_students[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>



