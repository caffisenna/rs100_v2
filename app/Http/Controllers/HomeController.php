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

        $districtCounts = EntryForm::select('district')
            ->selectRaw('COUNT(*) as total_count')
            ->selectRaw('SUM(CASE WHEN gender = "男" THEN 1 ELSE 0 END) as male_count')
            ->selectRaw('SUM(CASE WHEN gender = "女" THEN 1 ELSE 0 END) as female_count')
            ->whereNull('deleted_at')
            ->groupBy('district')
            ->orderBy('district', 'desc')
            ->get();

            $districtCounts = $districtCounts->sortBy(function ($district) {
            return array_search($district->district, [
                '大都心',
                'さくら',
                '城東',
                '山手',
                'つばさ',
                '世田谷',
                'あすなろ',
                '城北',
                '練馬',
                '多摩西',
                '新多磨',
                '南武蔵野',
                '町田',
                '北多摩'
            ]);
        });

        return view('home', compact(['configs', 'user', 'districtCounts']));
    }
}
