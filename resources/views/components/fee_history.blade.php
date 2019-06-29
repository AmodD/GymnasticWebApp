    <table class="table is-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Date</th>
          <th>Period</th>
          <th>Mode</th>
          <th>Amount</th>
          <th>Comments</th>
	  <th>Action</th>
        </tr>
      </thead>
      <tbody>
	@foreach($student->fees->sortByDesc('id') as $fee)
        <tr>
          <td>{{$fee->id}}</td>
          <td>{{$fee->date}}</td>
          <td>{{$fee->period}}</td>
          <td>{{$fee->mode}}</td>
          <td>{{$fee->amount}}</td>
          <td>{{$fee->comments}}</td>
	  <td>
		<div class="buttons">
  		<a href="/fees/receipt/{{$fee->id}}" target="_blank" class="button is-info is-pulled-right is-small">
			<span class="icon"><i class="fas fa-print"></i></span>
	        </a>
		<form method="GET" action="/fees/{{$fee->id}}/sendreceipt">
			@csrf
		<button id="send" class="button is-success is-info is-small">
			<span class="icon"><i class="fas fa-envelope"></i></span>
		</button>
		</form>
		&nbsp;&nbsp;
		@if (session('receipt_success_'.$fee->id))
		    <span class="help is-success">
		        {{ session('receipt_success_'.$fee->id) }}
		    </span>
		@endif
		<form action="/fees/{{$fee->id}}" method="POST">
		@method('DELETE')
	        @csrf
		<button onClick="javascript: return confirm('Please confirm deletion');" class="button is-small is-danger">
			<span class="icon is-small"><i class="fas fa-times"></i></span>
		</button>
		</form>
		</div>
	  </td>
	</tr>
	@endforeach
      </tbody>
    </table>
