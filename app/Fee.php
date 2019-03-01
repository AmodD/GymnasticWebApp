<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
	protected $fillable = [ 'student_id', 'date','amount'];

	public function student(){ 
		return $this->belongsTo(Student::class); 
	}
}
