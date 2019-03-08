<?php

namespace App;

use Carbon\Carbon;
use App\Student;
use App\Institute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Batch extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'centre_id', 'time'];

	public function centre() { 
		return $this->belongsTo(Centre::class);
		
		 }

	public function students()	{ 

		return $this->hasMany(Student::class);
		 }
	
	public function getAllBatchesForCentre($centreId) {

		 
		return $this->where('centre_id',$centreId)->get(); 
	}

	public function timeInAMPM()
	{
		return Carbon::createFromTimeString($this->timeHours().':'.$this->timeMins().':00')->format('g:i A');
	}

	public function timeHours()
	{
		return substr($this->time,0,2);
	}
	
	public function timeMins()
	{
		return substr($this->time,-2);
	}
	
}
