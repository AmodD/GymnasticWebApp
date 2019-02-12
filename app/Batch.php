<?php

namespace App;

use App\Student;
use App\Institute;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
	protected $fillable = [
        'name', 'centre_id',
    ];

	public function centre() { 
		return $this->belongsTo(Centre::class);
		
		 }

	public function students()	{ 

		return $this->hasMany(Student::class);
		 }
	
	public function getAllBatchesForCentre($centreId) {

		 
		return $this->where('centre_id',$centreId)->get(); 
	}
	
	
	
}
