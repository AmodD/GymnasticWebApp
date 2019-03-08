<?php

namespace App\Http\Controllers;

use App\Centre;
use App\Batch;
use Illuminate\Http\Request;

class CentreController extends Controller
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
        return view('centres_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('centre_add');
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
		"name" => 'required|max:127',
		"address" => 'required|max:255',
		"fee_amount" => 'required|numeric',
		"fee_frequency" => 'required',
	]);

	Centre::create($request->all());

	return redirect("/dashboard");
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
        return view('centre_edit', ['centre' => $centre]);
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
	$this->validate(request(),[
		"name" => 'required|max:127',
		"address" => 'required|max:255',
		"fee_amount" => 'required|numeric',
		"fee_frequency" => 'required',
	]);

	$centre->fill($request->all());
	$centre->save();

	return redirect("/dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institute  $institute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Centre $centre)
    {
	    $centre->students()->delete();
	    $centre->batches()->delete();
	    $centre->delete();

	    return back();
    }

    public function batches(Centre $centre)
    {
	    $batches = $centre->batches;
	    $centreName = $centre->name;
            return view('centre_batches',compact('batches','centreName'));
    }
}

