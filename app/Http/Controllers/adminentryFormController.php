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
        /** @var entryForm $entryForms */

        // 取得したいインスタンス = 子モデル::with(親モデル)->get(); で親子取得
        // $entryForms = entryForm::with('user')->get();
        $users = User::where(function ($query) {
            $query->where('is_admin', 0)
                ->Where('is_staff', 0)
                ->Where('is_commi', null)
                ->where('email_verified_at', '<>', null);
        })
            ->with('entryform')->with('elearning')->get();

        return view('admin.entry_forms.index')
            ->with('users', $users);
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
        switch ($entryForm->how_to_join) {
            case '1':
                $entryForm->how_to_join = "両日参加(両日とも7:00〜10:00までにスタート)";
                break;
            case '2':
                $entryForm->how_to_join = "両日参加(初日7:00〜10:00までにスタートかつ 2日目10:00以降スタート)";
                break;
            case '3':
                $entryForm->how_to_join = "両日参(初日10:00以降スタート かつ 2日目7:00〜10:00までにスタート)";
                break;
            case '4':
                $entryForm->how_to_join = "両日参加(両日とも10:00以降にスタート)";
                break;
            case '5':
                $entryForm->how_to_join = "1日目だけ参加(7:00〜10:00までにスタート)";
                break;
            case '6':
                $entryForm->how_to_join = "1日目だけ遅参(10:00以降にスタート)";
                break;
            case '7':
                $entryForm->how_to_join = "2日目だけ参加(7:00〜10:00までにスタート)";
                break;
            case '8':
                $entryForm->how_to_join = "2日目だけ遅参(10:00以降にスタート)";
                break;
        }

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
        $entryForm = entryForm::where('user_id', $id)->first();

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

            $name = User::where('id', $entryform->user_id)->value('name') . "(" . $entryform->org_district . ")";

            // slack
            $slackpost = new SlackPost();
            $slackpost->send(":white_check_mark: " . $name . ' の加盟登録チェック');

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
}
