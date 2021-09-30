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
                case 'caffi.senna@gmail.com':
                    $district = '山手';
                    break;
                default:
                    $district = '';
                    break;
            }
            $entryForms = entryForm::with('user')->where('district', $district)->orderby('dan_name', 'asc')->get();
            Auth::user()->district = $district;
            // 地区名をsessionに入れて別コントローラーでも使う
            session()->put('district',$district);
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
}
