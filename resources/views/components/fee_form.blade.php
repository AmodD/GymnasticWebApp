<form method="POST" action="/fees">
@csrf
<input type=hidden name=student_id value="{{$student->id}}">
<input type="hidden" name="students" value="0">
<div class="field has-addons">
  @component('components.date') @endcomponent
  <p class="control has-icons-left">
    <input class="input" type="text" name="amount"  value="{{$student->batch->centre->fee_amount}}" readonly>
    <span class="icon is-small is-left"><i class="fas fa-rupee-sign"></i></span>
  </p>
  <p class="control"><button id="paid" class="button is-primary">Paid</button></p>
</div>
</form>

<p class="help is-danger">{{ $errors->first('day') }}</p>
<p class="help is-danger">{{ $errors->first('month') }}</p>
<p class="help is-danger">{{ $errors->first('year') }}</p>								

@if (session('fee_success'))
    <div class="help is-success">
        {{ session('fee_success') }}
    </div>
@endif
