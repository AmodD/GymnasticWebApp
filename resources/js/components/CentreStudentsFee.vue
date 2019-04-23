<template>
<div>
       <table class="table is-striped">
        <thead>
          <tr>
            <th><input type="checkbox" onClick="toggle(this)"></th>
	    <th>New All</th>
          </tr>
        </thead>
        <tbody>
	<tr v-for="student in students">
	  <td><input name="selected_students[]" id="student_" :value="student.id"  type="checkbox"></td>
          <td><a href="/students/">{{student.name}}</a> </td>
	</tr>
        </tbody>
       </table>
</div>
</template>

<script>
    export default {
	props:['students','periodMY'],
	data : function() {
		return {
			selectedCentre: '',
			selectedBatch: '',
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
		// {{$student->fees()->where('period','periodMonthYear')->get()}}
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
