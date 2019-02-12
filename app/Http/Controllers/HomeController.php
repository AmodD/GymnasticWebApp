<?php

namespace App\Http\Controllers;

use App\Centre;
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
    public function index(Centre $centre)
    {
        $centres = $centre->all();
        return view('dashboard',compact('centres'));
    }
}
