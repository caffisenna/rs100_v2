<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Update;


class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 認証は不要
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ニュースを取得してwelcomeに投げる
        $updates = Update::orderBy('created_at', 'desc')->get();
        return view('welcome', compact('updates'));
    }
}
