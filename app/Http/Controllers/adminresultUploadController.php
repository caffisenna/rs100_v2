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
use App\Models\status;
use Carbon\Carbon;
use App\Http\Util\SlackPost;

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
            // **************** 保存処理 ****************
            // $resultUpload->save();
            // **************** 保存処理 ****************

            //ここからステータステーブルの更新
            $status = status::where('user_id', $resultUpload->user_id)->first();

            // 秒変換関数
            function to_time($from_time)
            {
                $sec = 0;
                $t = explode(":", $from_time); // : でバラす
                $h = (int)$t[0]; // 時間
                if (isset($t[1])) { // 分
                    $m = (int)$t[1];
                } else {
                    $m = 0;
                }
                if (isset($t[2])) { // 秒
                    $s = (int)$t[2];
                } else {
                    $s = 0;
                }
                $t = ($h * 60 * 60) + ($m * 60) + $s; // 秒に合算
                $sec = $sec + $t; // 合計時間(秒)に加算
                return $sec;
            }

            // 時間(h:m:s)に戻す
            function to_hour($from_sec)
            {
                $hour = floor($from_sec / 3600); // 時間
                $minutes = floor(($from_sec / 60) % 60); // 時間
                $from_seconds = floor($from_sec % 60); // 秒
                $val = sprintf("%2d:%02d:%02d", $hour, $minutes, $from_seconds);
                return $val;
            }

            // 時間を秒に換算
            $new_sec = to_time($resultUpload->time);

            // 歩行日判定と距離加算
            if ($resultUpload->day == 1) {
                $status->day1_distance = $status->day1_distance + $resultUpload->distance;
                $past_time = to_time($status->day1_time); // day1の累計時間を秒に換算
                $status->day1_time = to_hour($new_sec + $past_time);
            } elseif ($resultUpload->day == 2) {
                $status->day2_distance = $status->day2_distance + $resultUpload->distance;
                $past_time = to_time($status->day2_time); // day2の累計時間を秒に換算
                $status->day2_time = to_hour($new_sec + $past_time);
            }

            // 距離加算
            $status->total_distance = $status->day1_distance + $status->day2_distance;


            // 累計歩行時間計算
            if (isset($status->day1_time)) {
                $t1 = to_time($status->day1_time);
            }
            if (isset($status->day2_time)) {
                $t2 = to_time($status->day2_time);
            }
            if (isset($t1) && isset($t2)) {
                $t_total = to_hour($t1 + $t2);
            } elseif (empty($t1) && isset($t2)) {
                $t_total = to_hour($t2);
            } elseif (isset($t1) && empty($t2)) {
                $t_total = to_hour($t1);
            } elseif (empty($t1) && empty($t2)) {
                $t_total = 0;
            }

            $status->total_time = $t_total;


            // 50km 100km判定
            //slack通知
            $id = $status->user_id;
            $name = user::where('id', $id)->select('name')->first();
            $slack = new SlackPost();
            //slack通知

            $total_km = $status->day1_distance + $status->day2_distance;
            if (empty($status->reach_50km_time) && $total_km > 50) {
                $status->reach_50km_time = $t_total;
                $slack->send(":smile:[50km到達!] 参加者ID:$id " . $name->name . "さんが50kmに到達! (累計:$status->total_distance km)");
            }

            if (empty($status->reach_100km_time) && $total_km > 100) {
                // $status->reach_100km_time = carbon::now();
                $status->reach_100km_time = $t_total;
                $slack->send(":tada:[100km到達!] 参加者ID:$id " . $name->name . "さんが100kmに到達! (累計:$status->total_distance km)");
            }

            // 重複チェック機能
            if (empty($resultUpload->checkd_at)) {
                $resultUpload->save();
            } else {
                Flash::success('既にチェック済みです');
                return redirect(route('adminresultUploads.index'));
            }
            // $status->save();


            //ここまでステータステーブルの更新


            Flash::success("画像ID: $request->check チェックしました");

            //slack通知 画像チェック通知
            $slack->send(":white_check_mark: 参加者ID:$id " . $name->name . "のスクショをチェックしました。画像ID:" . $resultUpload->id);

            return redirect(route('adminresultUploads.index'));
        }

        // チェック済みのものは非表示に
        $resultUploads = resultUpload::all()->where('checked_at', NULL);

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

        // 重複チェック機能
        if (empty($resultUpload->checkd_at)) {
            $resultUpload->save();
        } else {
            Flash::success('既にチェック済みです');
            return redirect(route('adminresultUploads.index'));
        }

        Flash::success('Result Upload updated successfully.');

        return redirect(route('adminresultUploads.index'));
    }

    public function lists()
    {
        // 画像一覧を参加者と一緒に表示する
        // アクセス先は url('/')/admin/result_lists

        $users = User::where(function ($query) {
            $query->where('is_admin', 0)
                ->Where('is_staff', 0)
                ->Where('is_commi', null)
                ->where('email_verified_at', '<>', null);
        })
            ->with('entryform')->with('resultupload')->get();

        return view('admin.result_lists.index')
            ->with('users', $users);
    }
}
