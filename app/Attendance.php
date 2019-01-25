<?php

namespace App;

use App\Student;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [ 'student_id', 'date','present',   ];
    
    public function student(){
    	
    	$this->belongsTo(Student::class);
    }

    public function getAttendanceForAllStudents($student_id){

    	          return  $this->where('student_id',$student_id)->get();

    }
        
}
