<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateentryFormRequest;
use App\Http\Requests\UpdateentryFormRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\entryForm;
use Auth;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Util\SlackPost;
use Log;
use Mail;
use App\Mail\FeeConfirm;
use App\Mail\RegistrationConfirm;
use App\Models\Buddylist;
use Illuminate\Support\Facades\DB;

class adminentryFormController extends AppBaseController
{
    /**
     * Display a listing of the entryForm.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        if (isset($input['district'])) {
            $dictrict = $input['district'];
        }
        $district = $input['bs_gs'] ?? ($input['district'] ?? null);

        $users = User::where(function ($query) use ($district) {
            $query->where('is_admin', 0)
                ->where('is_staff', 0)
                ->where('is_commi', null)
                ->where('email_verified_at', '<>', null);

            if (isset($district) && $district === 'bs_gs') {
                $query->whereHas('entryform', function ($entryformQuery) use ($district) {
                    $entryformQuery->where('bs_gs', $district);
                });
            } elseif (isset($district)) {
                $query->whereHas('entryform', function ($entryformQuery) use ($district) {
                    $entryformQuery->where('district', $district);
                });
            }
        })
            ->with('entryform')
            ->with('elearning')
            ->get();

        return view('admin.entry_forms.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new entryForm.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.entry_forms.create');
    }

    /**
     * Store a newly created entryForm in storage.
     *
     * @param CreateentryFormRequest $request
     *
     * @return Response
     */
    public function store(CreateentryFormRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth()->user()->id;

        // 生年月日生成
        $input['birth_day'] = Carbon::create($input['bd_year'], $input['bd_month'], $input['bd_day']);

        /** @var entryForm $entryForm */
        $entryForm = entryForm::create($input);

        Flash::success('Entry Form saved successfully.');

        return redirect(route('adminentries.index'));
    }

    /**
     * Display the specified entryForm.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var entryForm $entryForm */
        // $entryForm = entryForm::find($id);
        $entryForm = entryForm::where('user_id', $id)->first();

        if (empty($entryForm)) {
            Flash::error('Entry Form not found');

            return redirect(route('entries.index'));
        }

        return view('admin.entry_forms.show')->with('entryForm', $entryForm);
    }

    /**
     * Show the form for editing the specified entryForm.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var entryForm $entryForm */
        // $entryForm = entryForm::find($id);
        $entryForm = entryForm::where('user_id', $id)->with('user')->first();

        // 生年月日分解
        $entryForm->bd_year =  carbon::parse($entryForm->birth_day)->year;
        $entryForm->bd_month =  carbon::parse($entryForm->birth_day)->month;
        $entryForm->bd_day =  carbon::parse($entryForm->birth_day)->day;

        if (empty($entryForm)) {
            Flash::error('Entry Form not found');

            return redirect(route('entries.index'));
        }

        return view('admin.entry_forms.edit')->with('entryForm', $entryForm);
    }

    /**
     * Update the specified entryForm in storage.
     *
     * @param int $id
     * @param UpdateentryFormRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateentryFormRequest $request)
    {
        /** @var entryForm $entryForm */
        $entryForm = entryForm::find($id);

        if (empty($entryForm)) {
            Flash::error('Entry Form not found');

            return redirect(route('adminentries.index'));
        }

        // 生年月日生成
        $request['birth_day'] = Carbon::create($request['bd_year'], $request['bd_month'], $request['bd_day']);

        $entryForm->fill($request->all());
        $entryForm->save();

        Flash::success('更新しました');

        return redirect(route('adminentries.index'));
    }

    /**
     * Remove the specified entryForm from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var entryForm $entryForm */
        // $entryForm = entryForm::find($id);
        $entryForm = entryForm::where('user_id', $id)->first();

        if (empty($entryForm)) {
            Flash::error('見つかりません');

            return redirect(route('adminentries.index'));
        }

        $entryForm->delete();

        Flash::success('削除しました');

        return redirect(route('adminentries.index'));
    }

    public function hq_confirm(Request $request)
    {
        /** @var entryForm $entryForm */

        // ユーザーデータもまとめて取得
        $entryForm = entryForm::with('user')->where('user_id', $request->q)->first();

        if (empty($entryForm)) {
            Flash::error('データが見つかりません');

            return redirect(route('adminentries.index'));
        }

        $entryForm->hq_confirmation = Carbon::now();
        $entryForm->save();

        // slack通知
        $slack = new SlackPost();
        $slack->send("[事務局確認] 参加者ID:$entryForm->id " . $entryForm->user->name . "の事務局確認が完了しました");

        Flash::success('事務局確認を行いました');

        return redirect(route('adminentries.index'));
    }

    public function deleted(Request $request)
    {
        /** @var entryForm $entryForms */

        $entryForms = entryForm::with('user')->onlyTrashed()->get();

        return view('admin.deleted.index')
            ->with('entryForms', $entryForms);
    }

    public function fee_check(Request $request)
    {
        /** @var entryForm $entryForms */

        // 入金ボタン処理
        if ($request['id']) {
            $entryform = entryForm::with('user')->where('id', $request['id'])->first();
            $entryform->fee_checked_at = now();

            $name = $entryform->user->name . "(" . $entryform->district . ")";

            // slack
            $slackpost = new SlackPost();
            $slackpost->send(":dollar: " . $name . ' の入金チェック');

            // 確認メール送信
            $sendto = $entryform->user->email;
            Mail::to($sendto)->queue(new FeeConfirm($entryform)); // メールをqueueで送信

            // logger
            Log::info('[入金チェック] ' . $name);

            $entryform->save();
            Flash::success($entryform->user->name . " の入金確認を行いました");
            return back();
        }

        // 取得したいインスタンス = 子モデル::with(親モデル)->get(); で親子取得
        // $entryForms = entryForm::with('user')->get();
        $users = User::where(function ($query) {
            $query->where('is_admin', 0)
                ->Where('is_staff', 0)
                ->Where('is_commi', null)
                ->where('email_verified_at', '<>', null);
        })
            ->with('entryform')->with('elearning')->get();

        return view('admin.entry_forms.fee_check')
            ->with('users', $users);
    }

    public function registration_check(Request $request)
    {
        /** @var entryForm $entryForms */

        // 登録確認ボタン処理
        if ($request['id']) {
            $entryform = entryForm::with('user')->where('id', $request['id'])->first();
            $entryform->registration_checked_at = now();

            $name = $entryform->user->name . "(" . $entryform->district . ")";

            // slack
            $slackpost = new SlackPost();
            $slackpost->send(":white_check_mark: " . $name . ' の加盟登録チェック');

            // 確認メール送信
            $sendto = $entryform->user->email;
            Mail::to($sendto)->queue(new RegistrationConfirm($entryform)); // メールをqueueで送信

            // logger
            Log::info('[登録チェック] ' . $name);

            $entryform->save();
            Flash::success($entryform->user->name . " の加盟登録確認を行いました");
            return back();
        }

        // 取得したいインスタンス = 子モデル::with(親モデル)->get(); で親子取得
        // $entryForms = entryForm::with('user')->get();
        $users = User::where(function ($query) {
            $query->where('is_admin', 0)
                ->Where('is_staff', 0)
                ->Where('is_commi', null)
                ->where('email_verified_at', '<>', null);
        })
            ->with('entryform')->with('elearning')->get();

        return view('admin.entry_forms.registration_check')
            ->with('users', $users);
    }

    public function non_tokyo(Request $request)
    {
        /** @var entryForm $entryForms */

        // 取得したいインスタンス = 子モデル::with(親モデル)->get(); で親子取得
        // $entryForms = entryForm::with('user')->get();
        $users = User::whereHas('entryform', function ($query) { // whereHas構文で子テーブルの条件で絞れる
            $query->where('prefecture', '<>', '東京');
        })->with('entryform')->with('elearning')->get();

        return view('admin.entry_forms.index')
            ->with('users', $users);
    }

    public function buddy_ok()
    {
        /** @var entryForm $entryForms */

        // $entryForms = entryForm::with('user')->where('buddy_ok','バディOK')->get();
        $users = User::whereHas('entryform', function ($query) {
            $query->where('buddy_ok', 'バディOK')->where('gender', '男');
        })->with('entryform')->with('elearning')->get();

        return view('admin.entry_forms.index')
            ->with('users', $users);
    }

    public function with_memo()
    {
        /** @var entryForm $entryForms */

        $users = User::whereHas('entryform', function ($query) {
            $query->where('memo', '<>', NULL);
        })->with('entryform')->with('elearning')->get();

        return view('admin.entry_forms.memo')
            ->with('users', $users);
    }

    public function health_check(Request $request)
    {
        // 健康調査票
        // inputを取得
        $input = $request->all();

        // 参加者データを取得
        $entryForm = entryForm::where('uuid', $input['q'])->with('user')->first();

        // PDF生成
        $pdf = \PDF::loadView('admin.entry_forms.healthcheck', compact('entryForm'));
        $pdf->setPaper('A4');
        return $pdf->download('RS100km_健康調査票兼Eラーニング修了書.pdf');
    }

    public function id_card(Request $request)
    {
        // IDカード

        // inputを取得
        $input = $request->all();

        // 参加者データを取得
        $user = User::where('id', $input['q'])->with('entryform')->first();

        // 以下、参加者と共通のbladeにデータを渡してPDFをレンダリングする
        $pdf = \PDF::loadView('entry_forms.id_card', compact('user'));
        $pdf->setPaper([0, 0, 283, 420], 'vertical'); // 縦レイアウト
        return $pdf->stream('RS100km_参加IDカード.pdf');
    }

    public function buddy_confirm(Request $request)
    {
        // IDカード

        // inputを取得
        $input = $request->all();


        // 参加者データを取得
        $buddy = Buddylist::where('id', $input['q'])->first();
        $buddy->confirmed = now();
        // dd($buddy->confirmed);

        $buddy->save();
        Flash::success("バディ登録を行いました");
        return back();
    }

    public function overage_filter(Request $request)
    {
        /** @var entryForm $entryForms */
        $entries = entryForm::where('birth_day', '<=', '1997-11-10')->with('user')->get();
        // dd($entries);


        return view('admin.overage.index')
            ->with(compact('entries'));
    }

    public function buddy_match(Request $request)
    {
        /** @var entryForm $entryForms */
        $entries = entryForm::where('buddy_match',  'バディの紹介を希望')->with('user')->get();
        // dd($entries);


        return view('admin.buddy_match.index')
            ->with(compact('entries'));
    }

    public function non_registered(Request $request)
    {
        // 未登録ユーザーの抽出
        $users = DB::table('users')
            ->leftJoin('entry_forms', 'users.id', '=', 'entry_forms.user_id')
            ->whereNull('entry_forms.user_id')
            ->whereNull('entry_forms.deleted_at')
            ->where('users.is_admin', 0)
            ->whereNull('users.is_commi')
            ->whereNotNull('users.email_verified_at')
            ->get();

        return view('admin.non_registered.index')
            ->with(compact('users'));
    }

    public function checkin(Request $request)
    {
        // 当日受付チェックイン

        $input = $request->all();

        if (isset($input['reg_number']) && strlen($input['reg_number']) >= 8) {
            $user = entryForm::where('bs_id', $input['reg_number'])->with('user')->firstOrFail();
        } elseif (isset($input['reg_number']) && strlen($input['reg_number']) <= 3) {
            $user = entryForm::where('zekken', $input['reg_number'])->with('user')->firstOrFail();
        } else {
            // それ以外ならばスキャン画面にリダイレクト
            return view('admin.checkin.index');
        }

        if (empty($user->checkin_at)) {
            $name = $user->user->name;
            $pref = $user->prefecture ? $user->prefecture . '連盟 ' : '';
            $dist = $user->district && $user->district !== 'なし' ? $user->district . '地区 ' : '';
            $dan = $user->dan_name && $user->dan_name !== 'なし' ? $user->dan_name . '団 ' : '';
            $zekken = $user->zekken;

            $user_info = "<span class='uk-text-large'>$name($user->furigana)</span> さん<br>所属: $pref$dist$dan<br>登録番号: " . $user->bs_id . "<br>ゼッケン: $zekken";

            Flash::success("$user_info<br><br><br>チェックイン完了! <br>Eラン兼健康調査票を確認してください");

            $user->checkin_at = now();
            $user->save();
        } else {
            $checkin_at = $user->checkin_at;
            Flash::error("{$user->user->name} さんは既にチェックイン済みです。<br>チェックイン時刻: $checkin_at <br>管理者に確認してください");
        }

        return view('admin.checkin.index');
    }

    public function checkin_done(Request $request)
    {
        //
        $users = entryForm::where('checkin_at', '<>', NULL)->with('user')->get();

        return view('admin.checkin.done')
            ->with(compact('users'));
    }

    public function checkin_not_yet(Request $request)
    {
        // 未チェックインを取得
        $users = entryForm::where('checkin_at', NULL)->with('user')->get();
        return view('admin.checkin.not_yet')->with(compact('users'));
    }

    public function checkin_delete(Request $request)
    {
        // チェックイン情報の削除
        // uuidを受け取ってDBからcheckin_atカラム情報をnull化する
        $input = $request->all();
        if (isset($input['uuid'])) {
            $user = entryForm::where('uuid', $input['uuid'])->with('user')->firstorFail();
            $user->checkin_at = NULL;
            $user->save();
            Flash::success($user->user->name . "さんのチェックイン情報を初期化しました。");
            $users = entryForm::where('checkin_at', '<>', NULL)->with('user')->get();
        }
        return view('admin.checkin.done')->with(compact('users'));
    }

    public function check_status(Request $request)
    {
        $input = $request->all();
        $cat = $input['cat'];
        if ($cat == 'commi') {
            $users = entryForm::where('prefecture', '東京')
                ->where('commi_ok', NULL)
                ->with('user')
                ->get();
        } elseif ($cat == 'dan') {
            $users = entryForm::where('prefecture', '東京')
                ->where('sm_confirmation', NULL)
                ->with('user')
                ->get();
        }

        return view('admin.check_status.index')->with(compact('users', 'cat'));
    }

    public function line_check(Request $request)
    {
        /** @var entryForm $entryForms */

        // 入金ボタン処理
        if ($request['id']) {
            $entryform = entryForm::with('user')->where('id', $request['id'])->first();
            $entryform->line_checked_at = now();

            $name = $entryform->user->name . "(" . $entryform->district . ")";

            // slack
            // $slackpost = new SlackPost();
            // $slackpost->send(":dollar: " . $name . ' の入金チェック');

            // logger
            Log::info('[LINEチェック] ' . $name);

            $entryform->save();
            Flash::success($entryform->user->name . " のLINE登録確認を行いました");
            return back();
        }

        // 一覧取得
        $users = User::where(function ($query) {
            $query->where('is_admin', 0)
                ->Where('is_staff', 0)
                ->Where('is_commi', null)
                ->where('email_verified_at', '<>', null);
        })
            ->with('entryform')->get();
        // $users = user::with('entryForm')->get();

        return view('admin.entry_forms.line_check')
            ->with(compact('users'));
    }

    public function regnumber_edit(Request $request)
    {
        //登録番号修正
        /** @var entryForm $entryForms */
        $input = $request->all();
        $user = entryForm::where('uuid', $input['uuid'])->with('user')->firstorFail();

        $method = $request->method();

        if ($method === 'GET') {
            // 修正画面の場合
            return view('admin.regnumber_edit.index')
                ->with(compact('user'));
        }
        if ($method === 'POST') {
            // 情報修正の場合
            $user->bs_id = $input['reg_number'];
            // 判定
            if (isset($user->bs_id) && is_numeric($user->bs_id) && strlen($user->bs_id) == 11) {
                $user->save();
                Log::info('[登録番号修正] ' . $user->user->name . ' ' . $user->bs_id);
                Flash::success($user->user->name . " さんの登録番号を修正しました( $user->bs_id )");
                return redirect()->Route('registration_check');
            } else {
                Flash::warning("登録番号が11桁の整数ではありません<br>入力された登録番号: $user->bs_id");
                return back();
            }
        }
    }

    public function isApplicationReceived(Request $request)
    {
        //他県連申込書到着
        /** @var entryForm $entryForms */
        $input = $request->all();
        $user = entryForm::where('uuid', $input['id'])->with('user')->firstorFail();

        $method = $request->method();

        if ($method === 'GET') {
            // 参加者の情報を表示
            return view('admin.ApplicationReceived.index')
                ->with(compact('user'));
        }

        if ($method === 'POST') {
            // 情報をDBに反映
            $user->sm_name = $input['sm_name'];
            $user->sm_position = $input['sm_position'];
            $user->sm_confirmation = $input['sm_confirmation'];
            $user->commi_ok = $input['commi_ok'];
            $user->save();
            Log::info('[他県申込書] ' . $user->user->name . ' の申込処理完了');
            Flash::success($user->user->name . " さんの申込書を処理しました(ゼッケン: $user->zekken )");
            return back();
        }
    }

    public function uncompleted_elearning(Request $request)
    {
        $users = User::select(
            'users.name',
            'users.email',
            'entry_forms.zekken as zekken',
            'entry_forms.prefecture as pref',
            'entry_forms.district as dist',
            'entry_forms.dan_name as dan',
            'entry_forms.memo as memo',
            'elearnings.created_at as Eラン'
        )
            ->leftJoin('entry_forms', 'users.id', '=', 'entry_forms.user_id')
            ->leftJoin('elearnings', 'users.id', '=', 'elearnings.user_id')
            ->where('is_admin', 0)
            ->where('is_staff', 0)
            ->whereNull('is_commi')
            ->whereNull('entry_forms.deleted_at')
            ->whereNotNull('email_verified_at')
            ->whereNotNull('entry_forms.id')
            ->whereNull('elearnings.created_at')
            ->get();

        if (isset($request['q']) && $request['q'] == 'email') {
            // メールアドレスのみを表示するview
            return view('admin.uncompleted_elearning.emails')
                ->with(compact('users'));
        } else {
            // 氏名と所属を表示するview
            return view('admin.uncompleted_elearning.index')
                ->with(compact('users'));
        }
    }
}
