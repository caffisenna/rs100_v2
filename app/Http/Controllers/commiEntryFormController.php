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
        $entryForms = entryForm::with('user')->where('district',Auth::user()->is_commi)->orderby('dan_name','asc')->get();

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

        // 自地区のみをフィルタ
        if (empty($entryForm) || $entryForm->district <> Auth::user()->is_commi) {
            Flash::error('参加者データが見つからない、もしくは閲覧権限がありません。');

            return redirect(route('entries.index'));
        }

        return view('commi.entry_forms.show')->with('entryForm', $entryForm);
    }
}
