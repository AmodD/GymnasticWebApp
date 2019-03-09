<?php

namespace App\Http\Controllers;

use App\Centre;
use App\Batch;
use App\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $centres = Centre::all();
        return view('dashboard',compact('centres'));
    }

    public function archives()
    {
	if(request()->entity == 'centre')
	{
		$centre = Centre::withTrashed()->where('id', request()->id)->get()->first();
		$centre->restore();
	}	
	else if(request()->entity == 'batch')
	{
		$this->validate(request(),["centre" => 'required',]);
		$batch = Batch::withTrashed()->where('id', request()->id)->get()->first();
		$batch->centre_id = request()->centre;
		$batch->restore();
	}
	else if(request()->entity == 'student')
	{
		$this->validate(request(),["batch" => 'required',"centre" => 'required']);
		$student = Student::withTrashed()->where('id', request()->id)->get()->first();
		$student->batch_id = request()->batch;
		$student->restore();
	}
	
	return back();

    }

}
