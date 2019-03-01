    <table class="table is-striped">
      <thead>
        <tr>
          <th>Date</th>
          <th>Amount</th>
	  <th>Receipt</th>
        </tr>
      </thead>
      <tbody>
	@foreach($student->fees->sortByDesc('id') as $fee)
        <tr>
          <td>{{$fee->date}}</td>
          <td>{{$fee->amount}}</td>
	  <td>
		<form method="GET" action="/fees/{{$fee->id}}/sendreceipt">
			@csrf
			<button id="send" class="button is-info">Send Receipt Email</button>
		</form>
		@if (session('receipt_success_'.$fee->id))
		    <span class="help is-success">
		        {{ session('receipt_success_'.$fee->id) }}
		    </span>
		@endif
	  </td>
	</tr>
	@endforeach
      </tbody>
    </table>
