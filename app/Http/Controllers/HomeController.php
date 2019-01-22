<?php

namespace App\Http\Controllers;

use App\Institute;
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
    public function index(Institute $institute)
    {
        $institutes = $institute->all();
        return view('dashboard',compact('institutes'));
    }
}
