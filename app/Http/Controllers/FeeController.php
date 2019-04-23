<?php

namespace App\Http\Controllers;

use App\Fee;
use App\Centre;
use App\Jobs\ProcessReceipts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Receipt;
use Illuminate\Support\Facades\Auth;

class FeeController extends Controller
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
    public function store(Fee $fee,Request $request)
    {

	$this->validate(request(),[
		"day" => 'required',
		"month" => 'required',
		"year" => 'required',
		"period" => 'required',
		"mode" => 'required',
	]);

	$feeDate = date("Y-m-d", strtotime($request->year."-".$request->month."-".$request->day));
	$amount = $request->amount;
	$mode = $request->mode;
	$period = $request->period;
	$comments = $request->input('comments', '');
	
	if($request->students)
	{
		$this->validate(request(),[
			"selected_students" => 'required'
		]);

		$selectedStudentsA = $request->input('selected_students');
		
		foreach($selectedStudentsA as $student_id)
		{
			$fee = new Fee;
	        	$fee->student_id = $student_id;
		        $fee->date = $feeDate;
        		$fee->amount = $amount;
        		$fee->mode = $mode;
        		$fee->period = $period;
        		$fee->comments = $comments;
			$fee->save();	

//			$this->sendreceipt($fee);
			Mail::to($fee->student->parent_email)->queue(new Receipt($fee) );
		}

		return back()->with('fee_success', 'Fee payment successfully added and Receipts emailed');
	}
	else
	{
		$fee = new Fee;
        	$fee->student_id = $request->student_id;
	        $fee->date = $feeDate;
        	$fee->amount = $amount;
        	$fee->mode = $mode;
        	$fee->period = $period;
        	$fee->comments = $comments;
		$fee->save();	

		return back()->with('fee_success', 'Fee payment successfully added');
	}

    }// endofmethod

    /**
     * Display the specified resource.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show(Fee $fee)
    {
	    //
	    //
	    //
	    //
	    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit(Fee $fee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fee $fee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fee $fee)
    {
        //
    }

    public function sendreceipt(Fee $fee)
    {
	    Mail::to($fee->student->parent_email)
		    ->send(new Receipt($fee) );
	    	//	    ->queue(new Receipt($fee));

		
	return back()->with('receipt_success_'.$fee->id, 'Receipt sent via email !!!');;
    }
    
    public function centres()
    {
	if(Auth::user()->id == 2) $centres = Centre::where('id','2')->get();
	else $centres = Centre::all();
	
	return view('fees',compact('centres'));
    }
    
    public function centre(Centre $centre)
    {
	//$centre = Centre::with('students.fees')->find($centre)->first();

	$students = Centre::with('students.fees')->find($centre->id)->students;
	    
	if(Auth::user()->id == 2 && $centre->id == 1) abort(403, 'Access denied');
	else  return view ('fees_centre',compact('centre','students'));
       
    }
    
    public function reports(Centre $centre)
    {
	    //$fees = $centre->students()->with('fees')->where('student.id','10')->get();
	//$fees = $centre->fees;
	//dd($fees);
	return view('fee_centre_report',compact('centre'));

    }	    

    public function centrePeriod(Centre $centre,Request $request)
    {
	    $fees = $centre->fees->where('period',$request->period)->whereNotIn('student_id', [38, 39]);
//	    $fees['amountTotal'] = $fees->sum('amount');	
	    return $fees;
    }
}
