<?php

namespace App\Http\Controllers;

use App\Centre;
use App\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{

	public function __construct()
	{
	    $this->middleware('auth');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::with('centre:id,name')->get(); 
        return view('batches_index',compact('batches'));
          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Centre $centre)
    {
        return view('batch_add',["centre" => $centre]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	$this->validate(request(),[
		"name" => 'required|max:255',
		"hours" => 'required',
		"minutes" => 'required',
	]);

	Batch::create([
		"centre_id" => $request->centre_id,
		"name" => $request->name,
		"time" => $request->hours.$request->minutes
	]);

	return redirect("/dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        return view ('batches_show',compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Centre $centre, Batch $batch)
    {
        return view('batch_edit',['batch' => $batch , 'centre' => $centre]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
	$this->validate(request(),[
		"name" => 'required|max:255',
		"hours" => 'required',
		"minutes" => 'required',
	]);

	$batch->name = $request->name;
	$batch->time = $request->hours.$request->minutes;
	$batch->save();

	return redirect("/dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
	    $batch->students()->delete();
	    $batch->delete();

	    return back();
    }

    public function students(Request $request, Batch $batch){
        
	    $students = $batch->students;
	    $centreName = $batch->centre->name;
	    $batchNameTime = $batch->name." ".$batch->time;
            return view('batch_students',compact('students','centreName','batchNameTime'));

    }
    
    
}
