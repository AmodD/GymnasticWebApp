<div id="app" class="section"> 
	<div class="columns is-mobile is-multiline">
	@foreach($students as $student)	 
		<div class="column is-one-quarter"> 
			<div class="box">

			<p class="title is-5" id="centre">{{$student->name}}</p> 
			@if($student->giveTodaysAttendance() == -1) 
				<p class="title is-7" id="centre">Not Yet Marked</p>
				<form action="/attendances" method="POST">
				{{csrf_field()}}
	  				<input type="hidden" name="student_id" value="{{$student->id}}">
					<button type="submit" name="present" value="1" id="present_{{$student->id}}" class="button is-primary">Present</button>			
					<button  type="submit" name="present" value="0" id="absent_{{$student->id}}" class="button is-danger">Absent</button>
				</form>
			@elseif($student->giveTodaysAttendance() == 1) 
				<p class="title is-7" id="centre">Status : Present</p> 
			@elseif($student->giveTodaysAttendance() == 0) 
				<p class="title is-7" id="centre">Status : Absent</p> 
			@endif
			</div>	
		</div>
	@endforeach	
	</div>
</div>

	<script type="text/javascript" src="/js/app.js"></script>
