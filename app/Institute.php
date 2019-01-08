<?php

namespace App;

use App\User;
use App\Batch;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{

	protected $fillable = [
        'name', 'user_id',
    ];

    public function user(){
    	
    	return $this->belongsTo(User::class);
    }

    public function batches(){
    	
    	return $this->hasMany(Batch::class);
    }
    
    
    
    

}
