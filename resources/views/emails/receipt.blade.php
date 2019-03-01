@component('mail::message')
# Receipt No.: <span style="color:red">{{ $fee->id }}</span>

@component('mail::panel')
Date: <b>{{ $fee->date }}</b><br>
Received with thanks from : <b>{{ $fee->student->name }} </b><br>
The Sum of Rupees : <b>{{ $fee->amount }}</b><br>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent


