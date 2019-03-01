<?php

namespace App\Http\Controllers;

use App\Fee;
use App\Centre;
use App\Jobs\ProcessReceipts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Receipt;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
	]);

	$feeDate = date("Y-m-d", strtotime($request->year."-".$request->month."-".$request->day));
	$amount = $request->amount;
	
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
			$fee->save();	

//			$this->sendreceipt($fee);
	    		Mail::to($fee->student->parent_email)->queue(new Receipt($fee) );
		}
	}
	else
	{
		$fee = new Fee;
        	$fee->student_id = $request->student_id;
	        $fee->date = $feeDate;
        	$fee->amount = $amount;
		$fee->save();	
	}


	return back()->with('fee_success', 'Fee payment successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show(Fee $fee)
    {
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
        $centres = Centre::all();
        return view('fees_centres',compact('centres'));
    }
    
    public function centre(Centre $centre)
    {
        return view ('fees_centre',compact('centre'));
    }
}
