@component('mail::message')
# Receipt No.: <span style="color:red">{{ $fee->id }}</span>

@component('mail::panel')
Date: <b>{{ $fee->date }}</b><br>
Received with thanks from : <b>{{ $fee->student->name }} </b><br>
The Sum of Rupees : <b>{{ $fee->amount }}</b><br>
In Words : <b>Rupees {{ ucwords( (new NumberFormatter("en", NumberFormatter::SPELLOUT) )->format($fee->amount) ) }} Only</b><br>
Via : <b>{{ $fee->mode }}</b><br>
Comments : <b>{{ $fee->comments }}</b><br>
For the Period : <b>{{ $fee->period }}</b><br>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
  		<button onClick="javascript: window.print();return false;">PRINT</button>
@endcomponent


