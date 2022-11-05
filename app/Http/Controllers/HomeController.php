<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminConfig;
use App\Models\User;

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

        // 健康調査の判定フラグ用にユーザーデータを取る
        $user = User::where('id', Auth()->id())->with('elearning')->first();

        return view('home', compact(['configs','user']));
    }
}
