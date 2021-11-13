<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminConfig;
use App\Models\status;

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

        $env = strtotime(ENV('USER_TEMP'));
        $now = strtotime(now());
        if($now > $env)  {
            $configs->temp_ok = 'true';
        }
        $status = status::where('user_id', auth()->id())->first();
        // dd($status);
        return view('home', compact(['configs','status']));
    }
}
