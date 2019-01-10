<?php

namespace App;

use App\Institute;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
	protected $fillable = [
        'name', 'institute_id',
    ];
	public function institute(){
		
		return $this->belongsTo(Institute::class);
	}
	
	
}
