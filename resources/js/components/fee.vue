<template>			
<div class="field has-addons has-addons-right">
<label class="label">Day</label>
  <p class="control">
    <span class="select">
      <select>
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
    </span>
  </p>
<label class="label">Amount</label>
  <p class="control">
    <input class="input" type="text"  value="{{amount}}" placeholder="amount">
  </p>
  <p class="control">
    <a class="button is-primary">
      Pay
    </a>
  </p>
</div>

</template>
<script>
	export default{
		props:{amount}
	}
</script>

