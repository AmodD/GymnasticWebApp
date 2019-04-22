<template>
<div>
	<div class="field">
	<div class="control">
	<div class="select">
		<select name="centre_id" v-on:change="getStudentsOnChangeOfCentre()"  v-model="selectedCentre" style="width: 150px" required >
			<option value="">All Centres</option>
			<option v-for="centre in centres" :value="centre.id" > {{ centre.name }}</option>
		</select>
	</div>		
	<div class="select">
		<select name="batch_id"  v-on:change="getStudentsOnChangeOfBatch()" v-model="selectedBatch" style="width: 150px" required >
			<option value="">All Batches</option>
			<option v-if="batch.centre_id == selectedCentre" v-for="batch in batches" :value="batch.id" > {{ batch.name }}</option>
		</select>
	</div>
	</div>
	</div>
	<div class="field">
	  <div class="control">
	    <input class="input is-warning" type="text" placeholder="Search..." v-model="search"  style="width: 250px;">
	  </div>
	</div>
	<div class="section box">
		<table class="table is-bordered">
		      <thead>
		        <tr>
		          <th>ID</th>
		          <th>Name</th>
		          <th>Parent Email</th>
		          <th>Parent Mobile</th>
		          <th>Date of Birth</th>
		          <th>Date of Joining</th>
		        </tr>
		      </thead>
		      <tbody>
			<tr v-if="students" v-for="student in filteredList">
			  <td>{{student.id}}</td> 	
			  <td><a :href="studentLink(student.id)">{{student.name}}</a></td>
			  <td>{{student.parent_email}}</td> 	
		          <td>{{student.parent_mobile}}</td>
			  <td>{{student.date_of_birth}}</td>
			  <td>{{student.date_of_joining}}</td>
		        </tr>
		      </tbody>
		</table>
	</div>	
</div>
</template>

<script>
    export default {
	props:['centres','batches', 'students'],
	data : function() {
		return {
			selectedCentre: '',
			selectedBatch: '',
			students:[],
			search: ''
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
	},	
	methods : {
	studentLink(id){
		return "/students/" + id;
	},
	getStudentsOnChangeOfCentre()
	{
		this.selectedBatch = '';
		this.getStudentsOnChangeOfBatch();
	},
	getStudentsOnChangeOfBatch(){
		
		axios.get('/getstudents', {
    			params: {
			      centre: this.selectedCentre,
			      batch: this.selectedBatch
			    }
			  })
			.then(response => this.students = response.data)
			.catch(function (error) {
			    console.log(error);
			  });
	}
	}
    }
</script>
