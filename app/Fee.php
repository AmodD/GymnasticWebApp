<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;

class Fee extends Model
{
	protected $fillable = [ 'student_id', 'date','amount','mode','period','comments'];

	public function student(){ 
		return $this->belongsTo(Student::class); 
	}

	public function studentWithArchived()
	{
		return $this->student()->withTrashed()->get();
	}
}
