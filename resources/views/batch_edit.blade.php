@extends('layouts.app')

@section('top')
@component('components.navbar') @endcomponent
@endsection

@section('mainbody')
<form action="/batches/{{$batch->id}}" method="POST">
@csrf
@method('PUT')
<div class="box column is-half is-offset-one-quarter">
<h1 class="title">{{$centre->name}}</h1>
<h1>EDIT BATCH</h1>

<input type=hidden name="centre_id" value="{{$centre->id}}">

<div class="field">
  <label class="label">Name</label>
  <div class="control">
    <input class="input" type="text" name="name" value="{{$batch->name}}"  placeholder="Name of Batch">
  </div>
</div>

<div class="field is-grouped">
  <label class="label">Time</label>
  <p class="control">
    <div class="select">
      <select name="hours">
        <option value="{{$batch->timeHours()}}">{{$batch->timeHours()}}</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
      </select>
  </div>
  </p>
  <p class="control">
    <div class="select">
      <select name="minutes">
        <option value="{{$batch->timeMins()}}">{{$batch->timeMins()}}</option>
        <option value="00">00</option>
	<option value="15">15</option>
	<option value="30">30</option>
	<option value="45">45</option>
      </select>
    </div>	
   </p>
  </div>

<div class="field">
 <button class="button is-link">Submit</button>
</div>



</div>
</form>
@endsection
