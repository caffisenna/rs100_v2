<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateplanUploadRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\planUpload;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use File;
use App\Http\Util\SlackPost;

class planUploadController extends AppBaseController
{
    /**
     * Display a listing of the planUpload.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var planUpload $planUploads */
        // 当該IDのみ抽出
        if (Auth::user()) {
            $planUploads = planUpload::where('user_id', Auth::user()->id)->get();
        } else {
            return view('auth.login');
        }

        return view('plan_uploads.index')
            ->with('planUploads', $planUploads);
    }

    /**
     * Show the form for creating a new planUpload.
     *
     * @return Response
     */
    public function create()
    {
        return view('plan_uploads.create');
    }

    /**
     * Store a newly created planUpload in storage.
     *
     * @param CreateplanUploadRequest $request
     *
     * @return Response
     */
    public function store(CreateplanUploadRequest $request)
    {
        $input = $request->all();

        // アップロードされたファイル名を取得
        // ユーザーID + unixtime
        $fileName = Auth::user()->id . '_' . time() . '.' . $request->file->extension();

        // 画像をpublicに移動
        $request->file->move(public_path('plans'), $fileName);

        $input['file_path'] = $fileName;

        /** @var planUpload $planUpload */
        $planUpload = planUpload::create($input);

        // slack通知
        $id = Auth()->user()->id;
        $name = Auth()->user()->name;
        $slack = new SlackPost();
        $slack->send(":memo:[計画書] 参加者ID:$id " . $name . "さんが計画書アップ!");

        Flash::success('アップロードが完了しました');

        return redirect(route('planUploads.index'));
    }

    /**
     * Show the form for editing the specified planUpload.
     *
     * @param int $id
     *
     * @return Response
     */


    /**
     * Remove the specified planUpload from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var planUpload $planUpload */
        $planUpload = planUpload::find($id);
        $delFileName = $planUpload->file_path;

        // ファイル削除
        File::delete(public_path('plans/') . $delFileName);


        if (empty($planUpload)) {
            Flash::error('Result Upload not found');

            return redirect(route('planUploads.index'));
        }

        $planUpload->delete();

        Flash::success('アップロード画像の削除が完了しました。');

        return redirect(route('planUploads.index'));
    }
}
