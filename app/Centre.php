<?php

namespace App;

use App\Batch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Centre extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [ 'name', 'address', 'fee_amount' , 'fee_frequency'  ];

    public function batches(){
    	
    	return $this->hasMany(Batch::class);
    }
    
    public function students()
    {
        return $this->hasManyThrough('App\Student', 'App\Batch');
    }    

    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    public function fees()
    {
        return $this->hasManyDeep('App\Fee', ['App\Batch','App\Student'])->withIntermediate('App\Student')->withTrashed('students.deleted_at');;
    }    
}
