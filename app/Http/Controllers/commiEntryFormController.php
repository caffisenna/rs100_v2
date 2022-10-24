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
use Session;
use App\Http\Util\SlackPost;
use Log;

class commiEntryFormController extends AppBaseController
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
        // 自地区のユーザーを抽出して返す
        if (Auth::user()->is_commi) {
            switch (Auth::user()->email) {
                case 'daitoshin@scout.tokyo':
                    $district = '大都心';
                    break;
                case  'sakura@scout.tokyo':
                    $district = 'さくら';
                    break;

                case  'joto@scout.tokyo':
                    $district = '城東';
                    break;

                case 'yamanote@scout.tokyo':
                    $district = '山手';
                    break;

                case  'tsubasa@scout.tokyo':
                    $district = 'つばさ';
                    break;

                case  'setagaya@scout.tokyo':
                    $district = '世田谷';
                    break;

                case 'asunaro@scout.tokyo':
                    $district = 'あすなろ';
                    break;

                case  'johoku@scout.tokyo':
                    $district = '城北';
                    break;

                case  'nerima@scout.tokyo':
                    $district = '練馬';
                    break;

                case  'tamanishi@scout.tokyo':
                    $district = '多摩西';
                    break;

                case  'aratama@scout.tokyo':
                    $district = '新多磨';
                    break;

                case  'mmusashino@scout.tokyo':
                    $district = '南武蔵野';
                    break;

                case  'machida@scout.tokyo':
                    $district = '町田';
                    break;

                case 'kitatama@scout.tokyo':
                    $district = '北多摩';
                    break;

                default:
                    $district = '';
                    break;
            }
            $entryForms = entryForm::with('user')->where('district', $district)->orderby('dan_name', 'asc')->get();
            Auth::user()->district = $district;
            // 地区名をsessionに入れて別コントローラーでも使う
            session()->put('district', $district);
        }

        return view('commi.entry_forms.index')
            ->with('entryForms', $entryForms);
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
        $entryForm = entryForm::find($id);
        $district = session()->get('district'); // sessionから地区名を取得

        // 自地区のみをフィルタ
        if (empty($entryForm) || $entryForm->district <> $district) {
            Flash::error('参加者データが見つからない、もしくは閲覧権限がありません。');

            return redirect(route('entries.index'));
        }

        return view('commi.entry_forms.show')->with('entryForm', $entryForm);
    }

    public function commi_check(Request $request)
    {
        /** @var entryForm $entryForms */

        // 確認ボタン処理
        if ($request['id']) {
            $entryform = entryForm::with('user')->where('user_id', $request['id'])->first();
            $entryform->commi_ok = now();

            $name = User::where('id', $request['id'])->value('name') . "(" . $entryform->district . ")";

            // slack
            $slackpost = new SlackPost();
            $slackpost->send(":white_check_mark: " . $name . ' の地区コミ確認');

            // logger
            Log::info('[地区コミチェック] ' . $name);

            $entryform->save();
            Flash::success($entryform->user->name . " の地区コミ確認を行いました");
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

        return view('admin.entry_forms.index')
            ->with('users', $users);
    }
}
