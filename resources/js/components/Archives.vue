<template>
<div>	
	<div class="field">
	  <div class="control">
	    <input class="input is-warning" type="text" placeholder="Search..." v-model="search"  style="width: 250px;">
	  </div>
	</div>
		<table class="table is-bordered">
		      <thead>
		        <tr>
		          <th>Entity</th>
		          <th>Id</th>
		          <th>Name</th>
		          <th>Details</th>
		          <th>Action</th>
		        </tr>
		      </thead>
		      <tbody>
			<tr v-for="centre in centres">
			  <td>Centre</td> 	
		          <td v-text="centre.id"></td>
			  <td v-text="centre.name"></td>
			  <td></td>
		          <td><a href="#" class="button is-link" @click="showModal = true;entity = 'centre',entityObj = centre">activate</a></td>
		        </tr>
			<tr v-for="batch in batches">
			  <td>Batch</td> 	
		          <td v-text="batch.id"></td>
			  <td v-text="batch.name"></td>
			  <td>centre id : {{batch.centre_id}}</td>
		          <td><a href="#" class="button is-link" @click="showModal = true;entity = 'batch',entityObj = batch">activate</a></td>
		        </tr>
			<tr v-for="student in filteredList">
			  <td>Student</td> 	
		          <td v-text="student.id"></td>
			  <td v-text="student.name"></td>
			   <td>batch id : {{student.batch_id}}</td>
		          <td><a href="#" class="button is-link"  @click="showModal = true;entity = 'student',entityObj = student" >activate</a></td>
		        </tr>
		      </tbody>
		</table>

<div id="myApp" v-if="showModal" class="modal is-active">
<form action="/archives" method="POST">
<slot name="csrf-field"></slot>
<input type=hidden name="id" v-model="entityObj.id">
<input type=hidden name="entity" v-model="entity">
  <div class="modal-background"></div>
 <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Activate</p>
    </header>
    <section class="modal-card-body">
	<div class="field">
	  <div class="control">
	    <input class="input is-info" type="text" v-model="entityObj.name" readonly>
	  </div>
	</div>
	<div  class="field is-grouped">
  <p class="control">
    <div class="select" v-if="entity == 'batch' || entity == 'student'">
      <select v-model="centre" name="centre" required>
        <option value="">Select Centre</option>
	<option v-for="activecentre in centresactive" :value="activecentre.id">{{activecentre.name}}</option>
      </select>
  </div>
  </p>
  <p class="control">
    <div class="select" v-if="entity == 'student'">
      <select v-model="batch" name="batch" required>
        <option value="">Select Batch</option>
	<option v-for="activebatch in batchesactive" v-if="centre == activebatch.centre_id" :value="activebatch.id">{{activebatch.name}}</option>
      </select>
    </div>	
   </p>
  </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-link">Re-Activate</button>
      <a href="/archives" class="button">Cancel</a>
    </footer>
  </div>
</form>
</div>

</div>
</template>
<script>

	export default{

	props:['centres','batches','students','centresactive','batchesactive'],
	data : function() {
		return {
			search: '',
			showModal : false,
		centre: '',
		batch: '',
		entity: '',
		entityObj: Object,
		}
	},
	computed: {
	    filteredList() {
	      return this.students.filter(student => {
        	return student.name.toLowerCase().includes(this.search.toLowerCase()) || 
		       student.parent_email.toLowerCase().includes(this.search.toLowerCase()) ||
		       student.parent_mobile.toLowerCase().includes(this.search.toLowerCase())
	      })
	    }
	}	


	}
</script>
