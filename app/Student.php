<?php

namespace App;

use App\Batch;
use App\Attendance;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = [ 'name', 'batch_id', ];

	public function batch()	{ 

		return $this->belongsTo(Batch::class); 
	}
	
	public function attendances() { 

		return $this->hasMany(Attendance::class); 
	}

	public function getStudentsWithBatchAndAttendance(){

		return $this->with(['attendances','batch'])->get();
	}

	public function giveTodaysAttendance()
	{
		$todaysAttendanceC = $this->attendances()->where('date',date('Y-m-d'))->get();

		if($todaysAttendanceC->isNotEmpty()) return $todaysAttendanceC->first()->present;
		else return -1;
	}

	
	

}
