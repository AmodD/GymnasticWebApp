<div id="app" class="section">
	<h1><span style="color:white">{{$student->name}}</span></h1>
<div class="tile is-ancestor">
  <div class="tile is-4 is-vertical is-parent">
    <div class="tile is-child box">
	<h3><a href="/centres/{{$student->batch->centre->id}}">{{$student->batch->centre->name}}</a></h3>
	<h5><a href="/batches/{{$student->batch->id}}">{{$student->batch->name}} {{$student->batch->time}}</a></h5>
	<br>
	<p><strong>Date of Birth</strong> : {{$student->date_of_birth}} </p>	
	<p><strong>Date of Joining</strong> : {{$student->date_of_joining}}  </p>	
	<p><strong>Parent Email</strong> : {{$student->parent_email}}  </p>	
	<p><strong>Parent Mobile</strong> : {{$student->parent_mobile}}  </p>	
    </div>
    <div class="tile is-child box">
      <p class="title">Fee</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.</p>
    </div>
  </div>
  <div class="tile is-parent">
    <div class="tile is-child box">
      <p class="title">Attendance</p>
<div class="column is-half">
    <table class="table is-striped">
      <thead>
        <tr>
          <th>Date</th>
          <th>Present/Absent</th>
        </tr>
      </thead>
      <tbody>
	@foreach($student->attendances as $attendance)
        <tr>
          <td>{{$attendance->date}}</td>
          <td>{{$attendance->present}}</td>
	</tr>
	@endforeach
      </tbody>
    </table>
  </div>
    </div>
  </div>
</div>

</div>

