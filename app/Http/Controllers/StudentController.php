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
	//if(request()->user()->id == 2) 
	//{
	//	$students = Student::with('batch.centre:id,name')->get()->where('batch.centre.id',2);    
	//	$centres = Centre::where('id',2)->get();
	//	$batches = Batch::where('centre_id',2)->get();    
	//}
		$students = Student::with('batch.centre:id,name')->get();    
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
	//	"parent_mobile" => 'required|digits:10|numeric',
	//	"date_of_birth" => 'required|date_format:"Y-m-d"',
	//	"date_of_joining" => 'required|date_format:"Y-m-d"',
	]);

	//Student::create($request->all());


	$student = new Student();

	$student->firstOrCreate([
	   	"batch_id" => $request->batch_id,
	   	"name" => $request->name,
	   	"parent_email" => $request->parent_email,
	   	"parent_mobile" => ($request->parent_mobile) ? $request->parent_mobile : "",
	   	"date_of_birth" => ($request->date_of_birth) ? $request->date_of_birth : "",
	   	"date_of_joining" => ($request->date_of_joining) ? $request->date_of_joining : ""
	]);

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
	    $student->date_of_leaving = date("Y-m-d");
	    $student->save();
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

    public function getStudentsForFees(Request $request)
    {
	    $period = $request->period;
	    $centre_id = $request->centre;

	    $students = Centre::with('students.fees')->find($centre_id)->students;
	    //$students = Centre::with('students.fees')->find($centre_id)->fees->where('period',$period)->pluck('student');
	 //   $students = Centre::with('students.fees')->where('centres.students.fees.period',$period)->get();

	    return $students;

    }
    
}
