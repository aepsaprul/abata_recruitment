<?php

namespace App\Http\Controllers;

use App\Models\LokerBiodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $biodata = LokerBiodata::where('email', Auth::user()->email)->first();

        return view('home', ['biodata' => $biodata]);
    }
}
