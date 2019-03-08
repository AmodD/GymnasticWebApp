<?php

namespace App;

use App\Batch;
use App\Attendance;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

	protected $fillable = ['name','batch_id','centre_id','parent_email','parent_mobile','date_of_birth','date_of_joining','date_of_leaving' ];

	public function batch()	{ 

		return $this->belongsTo(Batch::class); 
	}
	
	public function attendances() { 

		return $this->hasMany(Attendance::class); 
	}
	
	public function fees() { 

		return $this->hasMany(Fee::class); 
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

	public function feePaid($date)
	{

	}	
	

}
