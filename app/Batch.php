<?php

namespace App;

use App\Student;
use App\Institute;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
	protected $fillable = [
        'name', 'institute_id',
    ];

	public function institute() { return $this->belongsTo(Institute::class); }

	public function students()	{ return $this->hasMany(Student::class); }
	
	public function getAllBatchesForInstitute($instituteId) {

		 
		return $this->where('institute_id',$instituteId)->get(); 
	}
	
	
	
}
