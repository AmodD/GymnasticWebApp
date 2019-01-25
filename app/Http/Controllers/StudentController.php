<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student, Request $request)
    {
        
       $today=     Carbon::now();
       $tomorrow=  $today->addDay();
       $yesterday= $today->subDay(); 

       // $studentTwo = $student->with(['batch','attendances'])->find(347);

//dd($studentTwo);

       // $batch = $studentTwo->batch()->get();
       // $attendance = $studentTwo->attendances()->get();

       // dd($student,$studentTwo,$batch,$attendance);

        $students = $student->getStudentsForBatch($request->batchId);
       
       // $studentsListByLaravel = $student->all();
        // dd($studentsListByDravid);

        // $student->attendances->get();
        // dd($)


        return view ('showAllStudents',compact('students','today','tomorrow','yesterday'));
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
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
