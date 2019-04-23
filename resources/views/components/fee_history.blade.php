    <table class="table is-striped">
      <thead>
        <tr>
          <th>Date</th>
          <th>Period</th>
          <th>Mode</th>
          <th>Amount</th>
          <th>Comments</th>
	  <th>Receipt</th>
	  <th>Delete</th>
        </tr>
      </thead>
      <tbody>
	@foreach($student->fees->sortByDesc('id') as $fee)
        <tr>
          <td>{{$fee->date}}</td>
          <td>{{$fee->period}}</td>
          <td>{{$fee->mode}}</td>
          <td>{{$fee->amount}}</td>
          <td>{{$fee->comments}}</td>
	  <td>
		<form method="GET" action="/fees/{{$fee->id}}/sendreceipt">
			@csrf
			<button id="send" class="button is-small is-info">Send Receipt Email</button>
		</form>
		@if (session('receipt_success_'.$fee->id))
		    <span class="help is-success">
		        {{ session('receipt_success_'.$fee->id) }}
		    </span>
		@endif
	  </td>
	  <td>
		<form action="/fees/{{$fee->id}}" method="POST">
		@method('DELETE')
	        @csrf
		<button onClick="javascript: return confirm('Please confirm deletion');" class="button is-small is-danger">
			<span class="icon is-small"><i class="fas fa-times"></i></span>
		</button>
		</form>
	  </td>
	</tr>
	@endforeach
      </tbody>
    </table>
