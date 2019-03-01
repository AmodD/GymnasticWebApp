<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Batch;
use App\Student;
use App\Centre;
use Illuminate\Http\Request;
use carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Attendance $attendance,Request $request)
    {
	    if($request->students)
	    {
		$this->validate(request(),[
			"day" => 'required',
			"month" => 'required',
			"year" => 'required',
			"selected_students" => 'required'
		]);

		if ($request->has('selected_students'))
	       	{
			$selectedStudentsA = $request->input('selected_students');
			$present = (bool) $request->present;
			$attDate = date("Y-m-d", strtotime($request->year.'-'.$request->month.'-'.$request->day));
			
			foreach($selectedStudentsA as $student_id)
			{
            			$attendance->create([
		                    'student_id'=> $student_id,
                		    'date'=> $attDate,                
		                    'present'=> $present,  
				    ]);
			}
		}
	    }
	    else
	    {
            	$attendance->create([
                    'student_id'=>$request->student_id,
                    'date'=> date('Y-m-d'),                
                    'present'=> (bool) $request->present,  
		    ]);
	    }

	    return back()->with('attendance_success', 'Attendance successfully added');
    }   
    

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
    
    public function batch(Batch $batch)
    {
        return view ('attendances_batch',compact('batch'));
    }

    public function batches()
    {
        $batches = Batch::with('centre:id,name')->get(); 
        return view('attendances_batches',compact('batches'));
    }

    public function students(Request $request, Batch $batch){
        
	    $students = $batch->students;
	    $centreName = $batch->centre->name;
	    $batchNameTime = $batch->name." ".$batch->time;
            return view('attendances_today',compact('students','centreName','batchNameTime'));
    }

}
