@extends('layouts.app')

@section('top')
@component('components.navbar') @endcomponent
@endsection

@section('mainbody')
<form action="/centres" method="POST">
@csrf
<div class="box column is-half is-offset-one-quarter">
<h1>ADD CENTRE</h1>

<div class="field">
  <label class="label">Name</label>
  <div class="control">
    <input class="input" type="text" name="name"  placeholder="Name of Centre">
  </div>
</div>

<div class="field">
  <label class="label">Address</label>
  <div class="control">
    <input class="input" type="text" name="address" placeholder="Address in short . e.g. Sahakar Nagar">
  </div>
</div>

<div class="field">
  <label class="label">Fee Amount</label>
  <div class="control has-icons-left">
    <input class="input" type="text" name="fee_amount" placeholder="2500">
    <span class="icon is-small is-left"><i class="fas fa-rupee-sign"></i></span>
  </div>
</div>

<div class="field">
  <label class="label">Fee Frequency</label>
  <div class="control">
    <div class="select">
      <select name="fee_frequency">
        <option value="M">Monthly</option>
        <option value="Q">Quarterly</option>
      </select>
    </div>
  </div>
</div>

<div class="field">
 <button class="button is-link">Submit</button>
</div>

</div>
</form>
@endsection
