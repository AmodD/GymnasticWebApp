
  <p class="control"><span class="select"><select name="day" required selected><option value="">Day</option>
	@if(old('day')) <option value="{{old('day')}}" selected>{{old('day')}}</option>@endif
	@for ($i = 1; $i < 32; $i++) 
<option value="{{$i}}">{{$i}}</option>
	@endfor
      </select></span>
  </p>
  <p class="control"><span class="select"><select name="month" required><option value="">Month</option>
	@if(old('month')) <option value="{{old('month')}}" selected>{{old('month')}}</option>@endif
	@for ($i = 1; $i < 13; $i++)
<option value="{{$i}}">{{$i}}</option>
	@endfor
      </select></span>
  </p>
  <p class="control"><span class="select"><select name="year" required><option value="">Year</option>
	@if(old('year')) <option value="{{old('year')}}" selected>{{old('year')}}</option>@endif
	@for ($i = 2018; $i < 2022 ; $i++)
<option value="{{$i}}">{{$i}}</option>
	@endfor
      </select></span>
  </p>
