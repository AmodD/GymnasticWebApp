<?php

namespace App\Http\Controllers;

use App\Centre;
use App\Batch;
use App\Attendance;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
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
	$students = Student::with('batch.centre:id,name')->get();    
	    //        return view ('students_index',compact('students'));

	$centres = Centre::all();    
	$batches = Batch::all();    
        return view('students_index',["centres" => $centres , "batches" => $batches , "students" => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$centres = Centre::all();    
	$batches = Batch::all();    
        return view('student_add',["centres" => $centres , "batches" => $batches]);
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
		"batch_id" => 'required',
		"name" => 'required|max:255',
		"parent_email" => 'required|email',
		"parent_mobile" => 'required|digits:10|numeric',
		"date_of_birth" => 'required|date_format:"Y-m-d"',
		"date_of_joining" => 'required|date_format:"Y-m-d"',
	]);

	Student::create($request->all());

	return redirect("/students");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
	//$student = Student::with('batch.centre:id,name')->find($student->id);    
	    $student->load(['batch.centre','attendances']);
        return view ('students_show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
	$centres = Centre::all();    
	$batches = Batch::all();    
        return view('student_edit',['student' => $student, "centres" => $centres , "batches" => $batches]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
	$this->validate(request(),[
		"batch_id" => 'required',
		"name" => 'required|max:255',
		"parent_email" => 'required|email',
		"parent_mobile" => 'required|digits:10|numeric',
		"date_of_birth" => 'required|date_format:"Y-m-d"',
		"date_of_joining" => 'required|date_format:"Y-m-d"',
	]);

	$student->fill($request->all());
	$student->save();

	return redirect("/students");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
	$student->delete();

        return redirect('/students');
    }

    public function getStudents(Request $request)
    {
	    $centre_id = $request->centre;
	    $batch_id = $request->batch;

	    if($batch_id) $students = Batch::find($batch_id)->students;
	    else $students = Centre::find($centre_id)->students;	
	    //$students = Student::all();

	    return $students;

    }

    
}
