<?php

namespace App\Http\Controllers;

use App\Centre;
use App\Batch;
use Illuminate\Http\Request;

class CentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Centre $centre)
    {
        $centres = $centre->all();
        return view('showCentres',compact('centres'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function show(Centre $centre)
    {
        dd("show method")    ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function edit(Centre $centre)
    {
        dd("edit method");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Centre $centre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Centre $centre)
    {
                dd("destroy method");
    }

    public function batches(Centre $centre)
    {
	    $batches = $centre->batches;
	    $centreName = $centre->name;
            return view('centre_batches',compact('batches','centreName'));
    }
    
    public function batchStudents(Centre $centre,Batch $batch)
    {
	    $students = $batch->students;
	    $centreName = $centre->name;
	    $batchNameTime = $batch->name." ".$batch->time;
            return view('batch_students',compact('students','centreName','batchNameTime'));
    }
}
