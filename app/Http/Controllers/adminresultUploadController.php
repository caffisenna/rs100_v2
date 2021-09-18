<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateresultUploadRequest;
use App\Http\Requests\UpdateresultUploadRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\resultUpload;
use App\Models\entryForm;
use App\Models\User;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use File;

class adminresultUploadController extends AppBaseController
{
    /**
     * Display a listing of the resultUpload.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var resultUpload $resultUploads */

        // チェックアイコンが押されたときの処理
        if (isset($request->check)) {
            $resultUpload = resultUpload::find($request->check);
            // 現在時刻を取得
            $resultUpload->checked_at = now();
            $resultUpload->save();
            Flash::success("画像ID: $request->check チェックしました");
            return redirect(route('adminresultUploads.index'));
        }

        $resultUploads = resultUpload::all();

        // 氏名、地区名、団名を取得
        foreach ($resultUploads as $value) {
                $name = User::where('id', $value['user_id'])->first('name');
                $value['user_name'] = $name->name;

                // ユーザーIDで引っかけて、地区と団名カラムだけ引っこ抜く
                $dan_info = entryForm::where('user_id', $value['user_id'])->first(['district', 'dan_name']);
                // 配列に入れる
                try {
                    $value['district'] = $dan_info->district;
                } catch (\Throwable $e) {
                    $value['district'] = '申込書なし';
                }
                try {
                    $value['dan_name'] = $dan_info->dan_name;
                } catch (\Throwable $e) {
                    $value['dan_name'] = '申込書なし';
                }
        }
        // dd($resultUploads);

        // ↓の方法だと結果が入れ子の配列になってbladeでうまく展開できない
        // 結果データを主にして、そこから氏名や地区を拾う方がよさそう
        // $users = User::select('id','name')->with(['entryForm','resultUpload'])->get();

        return view('admin.result_uploads.index')
            ->with('resultUploads', $resultUploads);
    }

    /**
     * Show the form for creating a new resultUpload.
     *
     * @return Response
     */
    public function create()
    {
        return view('result_uploads.create');
    }

    /**
     * Store a newly created resultUpload in storage.
     *
     * @param CreateresultUploadRequest $request
     *
     * @return Response
     */
    public function store(CreateresultUploadRequest $request)
    {
        $input = $request->all();

        // アップロードされたファイル名を取得
        // ユーザーID + unixtime
        $imageName = Auth::user()->id . '_' . time() . '.' . $request->image->extension();

        // 画像をpublicに移動
        $request->image->move(public_path('images/user_uploads'), $imageName);

        $input['image_path'] = $imageName;

        // ここから画像解析処理
        // 公開dir設定
        $pp = public_path() . "/images/user_uploads/";

        // 実行コマンド生成 引数で画像ファイルを渡す
        // pwd はshell script側でやる
        $cmd = $pp . "ocr.sh $imageName";

        // 実行
        exec($cmd);

        // OCR結果ファイル読み込み
        // $result = file($pp . $imageName . "_result.txt", FILE_IGNORE_NEW_LINES);
        $result = file($pp . $imageName . "_result.txt");
        // dd($result);
        // 半角スペースで1行だけexplode
        foreach ($result as $key => $value) {
            $lines[] = explode(" ", $result[$key]);
        }
        // dd($lines);


        // inputに格納
        // $input['date'] = $result['0'];
        $input['time'] = str_replace(PHP_EOL, '', $lines['1']['0']);
        $input['distance'] = str_replace(PHP_EOL, '', $lines['0']['1']);
        // ここまで画像解析処理


        /** @var resultUpload $resultUpload */
        $resultUpload = resultUpload::create($input);

        Flash::success('アップロードが完了しました');

        return redirect(route('admin.resultUploads.index'));
    }

    /**
     * Display the specified resultUpload.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var resultUpload $resultUpload */
        $resultUpload = resultUpload::find($id);

        if (empty($resultUpload)) {
            Flash::error('Result Upload not found');

            return redirect(route('admin.resultUploads.index'));
        }

        return view('admin.result_uploads.show')->with('resultUpload', $resultUpload);
    }

    /**
     * Show the form for editing the specified resultUpload.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var resultUpload $resultUpload */
        $resultUpload = resultUpload::find($id);

        if (empty($resultUpload)) {
            Flash::error('Result Upload not found');

            return redirect(route('adminresultUploads.index'));
        }

        return view('admin.result_uploads.edit')->with('resultUpload', $resultUpload);
    }

    /**
     * Update the specified resultUpload in storage.
     *
     * @param int $id
     * @param UpdateresultUploadRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        // $requestを直で受けて修正処理を書く
        /** @var resultUpload $resultUpload */
        $resultUpload = resultUpload::find($id);

        if (empty($resultUpload)) {
            Flash::error('Result Upload not found');

            return redirect(route('adminresultUploads.index'));
        }

        $resultUpload->fill($request->all());
        $resultUpload->save();

        Flash::success('Result Upload updated successfully.');

        return redirect(route('adminresultUploads.index'));
    }

    /**
     * Remove the specified resultUpload from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var resultUpload $resultUpload */
        $resultUpload = resultUpload::find($id);
        $delFileName = $resultUpload->image_path;

        // ファイル削除
        File::delete(public_path('/images/user_uploads/') . $delFileName);
        File::delete(public_path('/images/user_uploads/') . $delFileName . '_result.txt');


        if (empty($resultUpload)) {
            Flash::error('Result Upload not found');

            return redirect(route('adminresultUploads.index'));
        }

        $resultUpload->delete();

        Flash::success('アップロード画像の削除が完了しました。');

        return redirect(route('adminresultUploads.index'));
    }

    public function check($id, Request $request)
    {
        // $requestを直で受けて修正処理を書く
        /** @var resultUpload $resultUpload */
        $resultUpload = resultUpload::find($id);

        if (empty($resultUpload)) {
            Flash::error('Result Upload not found');

            return redirect(route('adminresultUploads.index'));
        }

        $resultUpload->fill($request->all());
        $resultUpload->save();

        Flash::success('Result Upload updated successfully.');

        return redirect(route('adminresultUploads.index'));
    }
}
