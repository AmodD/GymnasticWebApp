<?php

namespace App;

use App\Batch;
use App\Attendance;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [ 'name', 'batch_id',   ];

	public function batch()	{ return $this->belongsTo(Batch::class); }
	
	public function attendances() { return $this->hasMany(Attendance::class); }

	public function getStudentsForBatch($batch_id){
				
		return $this->where('batch_id',$batch_id)->get();
	}
			
					
}
