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
      <p class="title">Attendance</p>
    <table class="table is-striped">
      <thead>
        <tr>
          <th>Date</th>
          <th>Present/Absent</th>
        </tr>
      </thead>
      <tbody>
	@foreach($student->attendances->sortByDesc('id') as $attendance)
        <tr>
          <td>{{$attendance->date}}</td>
	  <td class="">
		@if($attendance->present) <button class="button is-success is-small is-rounded" disabled><b>P</b></button>
		@else <button class="button is-danger is-small is-rounded" disabled><b>A</b></button>
		@endif
	</td>
	</tr>
	@endforeach
      </tbody>
    </table>
    </div>
  </div>
  <div class="tile is-parent">
    <div class="tile is-child box">
      <p class="title">Fee</p>
	@component('components.fee_form',["student" => $student]) @endcomponent
	@component('components.fee_history',["student" => $student]) @endcomponent
    </div>
  </div>
</div>


