<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminConfig;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configs = AdminConfig::where('id', 1)->get()->first();
        return view('home', compact('configs'));
    }
}
