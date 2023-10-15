<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminConfig;
use App\Models\User;
use App\Models\entryForm;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Http\Controllers\commiEntryFormController;

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

        // $district_counts = EntryForm::select('district', DB::raw('count(*) as count'))
        //     ->whereNull('deleted_at')
        //     ->groupBy('district')
        //     ->orderBy('district', 'desc')
        //     ->get();
        $districtCounts = EntryForm::select('district')
            ->selectRaw('COUNT(*) as total_count')
            ->selectRaw('SUM(CASE WHEN generation = "現役" THEN 1 ELSE 0 END) as active_count')
            ->selectRaw('SUM(CASE WHEN generation = "オーバーエイジ" THEN 1 ELSE 0 END) as over_age_count')
            ->selectRaw('SUM(CASE WHEN gender = "男" THEN 1 ELSE 0 END) as male_count')
            ->selectRaw('SUM(CASE WHEN gender = "女" THEN 1 ELSE 0 END) as female_count')
            ->whereNull('deleted_at')
            ->groupBy('district')
            ->orderBy('district', 'desc')
            ->get();

        // if (Auth::user()->is_commi) {
            // return redirect()->roure('commiEntryFormController.index');
        // } else {
            return view('home', compact(['configs', 'user', 'districtCounts']));
        // }
    }
}
