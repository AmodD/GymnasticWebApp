	<div class="columns is-multiline">
	@foreach($students as $student)	 
	<div class="column is-one-quarter"> 
		<div class="box">
			<p class="title is-5" id="centre"><a id="details_{{$student->id}}" href="/students/{{$student->id}}">{{$student->name}}</a></p> 
			<p class="subtitle is-6" id="centre">{{$student->batch->centre->name}} / {{ $student->batch->timeInAMPM() }}</p> 
			@if($student->giveTodaysAttendance() == -1) 
			<p class="title is-7" id="centre">Today's Attendance : Not Yet Marked</p>
			<form action="/attendances" method="POST">
			{{csrf_field()}}
	  			<input type="hidden" name="student_id" value="{{$student->id}}">
	  			<input type="hidden" name="students" value="0">
				<button type="submit" name="present" value="1" id="present_{{$student->id}}" class="button is-primary">Present</button>	
				<button  type="submit" name="present" value="0" id="absent_{{$student->id}}" class="button is-danger is-pulled-right">Absent</button>
			</form>
			@elseif($student->giveTodaysAttendance() == 1)
			<div class="title is-7" id="status_present_{{$student->id}}">Today's Attendance : Present</div> 
			@elseif($student->giveTodaysAttendance() == 0) 
			<div class="title is-7" id="status_absent_{{$student->id}}">Today's Attendance : Absent</div> 
			@endif
		</div>	
	</div>
	@endforeach	
	</div>

