<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateresultUploadRequest;
use App\Http\Requests\UpdateresultUploadRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\resultUpload;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use File;
use App\Http\Util\SlackPost;

class resultUploadController extends AppBaseController
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
        // 当該IDのみ抽出
        if (Auth::user()) {
            $resultUploads = resultUpload::where('user_id', Auth::user()->id)->get();
        } else {
            return view('auth.login');
        }

        // 総距離計算
        $resultUploads->distance_sum = resultUpload::where('user_id', Auth::user()->id)->sum('distance');

        // 合計タイム計算
        $time_sum = 0;
        foreach ($resultUploads as $value) {
            $t = explode(":", $value['time']); //配列（$t[0]（時）、$t[1]（分）、$t[2]（秒））にする
            $h = (int)$t[0];
            if (isset($t[1])) { //分の部分に値が入っているか確認
                $m = (int)$t[1];
            } else {
                $m = 0;
            }
            if (isset($t[2])) { //秒の部分に値が入っているか確認
                $s = (int)$t[2];
            } else {
                $s = 0;
            }
            $t = ($h * 60 * 60) + ($m * 60) + $s;
            $time_sum = $time_sum + $t;
        }
        $hours = floor($time_sum / 3600); //時間
        $minutes = floor(($time_sum / 60) % 60); //分
        $seconds = floor($time_sum % 60); //秒
        $resultUploads->hms = sprintf("%2d:%02d:%02d", $hours, $minutes, $seconds);

        // dd($resultUploads->hms);

        return view('result_uploads.index')
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

        // inputに格納
        if (isset($lines['1']['0'])) {
            $input['time'] = str_replace(PHP_EOL, '', $lines['1']['0']);
        }else{
            Flash::warning('正しいスクリーンショットがアップロードされなかった可能性があります。<br>
            もし結果のスクリーンショットをアップしようとしてこのエラーメッセージが表示されている場合は下記のアドレスに画像を送信して下さい。<br>
            <a href="mailto:register.rs100km@gmail.com">register.rs100km@gmail.com</a>');
            return redirect(route('resultUploads.index'));
        }
        if (isset($lines['0']['1'])) {
            $input['distance'] = str_replace(PHP_EOL, '', $lines['0']['1']);
        }else{
            Flash::warning('正しいスクリーンショットがアップロードされなかった可能性があります。<br>
            もし結果のスクリーンショットをアップしようとしてこのエラーメッセージが表示されている場合は下記のアドレスに画像を送信して下さい。<br>
            <a href="mailto:register.rs100km@gmail.com">register.rs100km@gmail.com</a>');
            return redirect(route('resultUploads.index'));
        }
        // ここまで画像解析処理

        // 初日 or 二日目判定
        $day_limit = strtotime('2021-09-30 22:50:00');
        $now = strtotime(now());
        if ($day_limit > $now){
            $input['day'] = 1;
        }else{
            $input['day'] = 2;
        }

        /** @var resultUpload $resultUpload */
        $resultUpload = resultUpload::create($input);

        //slack通知
        $resultUploads = resultUpload::where('user_id', Auth::user()->id)->get();
        $resultUploads->distance_sum = resultUpload::where('user_id', Auth::user()->id)->sum('distance');
        $id = Auth()->user()->id;
        $name = Auth()->user()->name;
        $slack = new SlackPost();
        if($resultUploads->distance_sum > 100){
            $slack->send(":tada:[100km到達!] 参加者ID:$id " . $name . "さんが100kmに到達! (累計:$resultUploads->distance_sum km)");
        }elseif(($resultUploads->distance_sum > 50)){
            $slack->send(":smile:[50km到達!] 参加者ID:$id " . $name . "さんが50kmに到達! (累計:$resultUploads->distance_sum km)");
        }else{
            $slack->send(":frame_with_picture:[スクショ] 参加者ID:$id " . $name . "さんがスクショアップ! (累計:$resultUploads->distance_sum km)");
        }

        Flash::success('アップロードが完了しました');

        return redirect(route('resultUploads.index'));
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

            return redirect(route('resultUploads.index'));
        }

        return view('result_uploads.show')->with('resultUpload', $resultUpload);
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

            return redirect(route('resultUploads.index'));
        }

        return view('result_uploads.edit')->with('resultUpload', $resultUpload);
    }

    /**
     * Update the specified resultUpload in storage.
     *
     * @param int $id
     * @param UpdateresultUploadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateresultUploadRequest $request)
    {
        /** @var resultUpload $resultUpload */
        $resultUpload = resultUpload::find($id);

        if (empty($resultUpload)) {
            Flash::error('Result Upload not found');

            return redirect(route('resultUploads.index'));
        }

        $resultUpload->fill($request->all());
        $resultUpload->save();

        Flash::success('Result Upload updated successfully.');

        return redirect(route('resultUploads.index'));
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

            return redirect(route('resultUploads.index'));
        }

        $resultUpload->delete();

        Flash::success('アップロード画像の削除が完了しました。');

        return redirect(route('resultUploads.index'));
    }
}
