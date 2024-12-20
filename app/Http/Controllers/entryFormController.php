<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateentryFormRequest;
use App\Http\Requests\UpdateentryFormRequest;
use App\Http\Controllers\AppBaseController;
use App\Mail\SmConfirm;
use App\Models\entryForm;
use Auth;
use Illuminate\Http\Request;
use Flash;
use Ramsey\Uuid\Uuid;
use Response;
use App\Models\AdminConfig;
use App\Models\elearning as ModelsElearning;
use Carbon\Carbon;
use App\Models\User;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\elearning;
use Mail;
use App\Http\Util\SlackPost;
use App\Mail\EntryformCreated;
use Log;
use App\Models\Buddylist;

class entryFormController extends AppBaseController
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
        // $entryForms = entryForm::all();
        $entryForm = entryForm::where('user_id', Auth::user()->id)->first();

        // Eラーニング
        try {
            $elearning = elearning::where('user_id', Auth::user()->id)->where('deleted_at', NULL)->first();
            $entryForm->elearning = $elearning->created_at;
        } catch (\Throwable $e) {
            // エラー発生でも進める
        }

        if (is_null($entryForm)) {
            $entryForm = new entryForm;
            // $entryForm->elearning = $elearning->created_at;
        }

        $entryForm->available = AdminConfig::first()->create_application;
        $configs = AdminConfig::first();

        // バディ取得
        $zekken = $entryForm->zekken;
        $buddy = Buddylist::where('person1', $zekken)
            ->orWhere('person2', $zekken)
            ->orWhere('person3', $zekken)
            ->orWhere('person4', $zekken)
            ->orWhere('person5', $zekken)
            ->first();

        if (isset($buddy)) {
            $bd = array(); // バディを配列で格納する
            $personIds = [
                $buddy->person1,
                $buddy->person2,
                $buddy->person3,
                $buddy->person4,
                $buddy->person5
            ];

            foreach ($personIds as $index => $personId) {
                if ($personId) {
                    $personVariableName = 'person' . ($index + 1);
                    $bd[$personVariableName] = entryForm::where('zekken', $personId)->with('user')->first();
                }
            }
        }

        if (isset($bd)) {
            return view('entry_forms.index', compact('entryForm', 'configs', 'bd'));
        } else {
            return view('entry_forms.index', compact('entryForm', 'configs'));
        }
    }

    /**
     * Show the form for creating a new entryForm.
     *
     * @return Response
     */
    public function create()
    {
        $config = AdminConfig::first()->create_application;
        if ($config) {
            return view('entry_forms.create');
        } else {
            return redirect('/home');
        }
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
        $input['uuid'] = Uuid::uuid4();

        // チェックデジット計算
        // 10桁の場合は以下を実行
        // 9桁以下の場合は知らん
        if (strlen($input['bs_id']) == 10) {
            $value = $input['bs_id'];
            $length = strlen($value);

            if ($length === 10 && ctype_digit($value) && intval(substr($value, 0, 2)) < 49) {
                $sum = 0;
                for ($i = 0; $i < $length; $i++) {
                    $digit = intval(substr($value, $i, 1));
                    if (($i + 1) % 2 === 0) {
                        $multiplied_digit = $digit * 3;
                    } else {
                        $multiplied_digit = $digit;
                    }
                    $sum += $multiplied_digit;
                }
                $check_digit = 10 - ($sum % 10);
                // echo $value . $check_digit . PHP_EOL;
                $input['bs_id'] = $value . $check_digit;
            } elseif ($length === 9 && ctype_digit($value)) {
                $sum = 0;
                for ($i = 0; $i < $length; $i++) {
                    $digit = intval(substr($value, $i, 1));
                    if (($i + 1) % 2 === 0) {
                        $multiplied_digit = $digit * 3;
                    } else {
                        $multiplied_digit = $digit;
                    }
                    $sum += $multiplied_digit;
                }
                $check_digit = 10 - ($sum % 10);
                echo '0' . $value . $check_digit . PHP_EOL;
            } else {
                echo 'エラー' . PHP_EOL;
            }
        }


        // 生年月日生成
        $input['birth_day'] = Carbon::create($input['bd_year'], $input['bd_month'], $input['bd_day']);
        // 存在する日付かチェック
        if (!checkdate($input['bd_month'], $input['bd_day'], $input['bd_year'])) {
            return back()->with('message', '存在しない日付です');
        }

        /** @var entryForm $entryForm */
        // DBに登録する前に user_id の重複を判定する
        // try {
        //     $entryForm = entryForm::create($input);
        // } catch (\Illuminate\Database\QueryException $e) {
        //     if ($e->errorInfo[1] == 1062) { // ユニーク制約違反のエラーコード
        //         return back()->withInput()->withErrors(['user_id' => '既に申し込みが行われています。重複して申し込みデータを作成することはできません。']);
        //     }
        //     // その他のデータベースエラーを処理するコード
        // }

        // DBに保存
        // 重複申込は modelのルールで排除するように変更
        entryForm::create($input);

        // データ取得
        $data = entryForm::where('user_id', $input['user_id'])->first();
        $entryCounts = entryForm::all()->count();
        $genderM = entryForm::where('gender', '男')->count();
        $genderF = entryForm::where('gender', '女')->count();

        $data->district = str_replace('地区', '', $data->district);

        //slack通知
        $id = Auth()->user()->id;

        $name = Auth()->user()->name;
        $belongs = '所属: ' . $data->prefecture . '連盟 ' . $data->district . '地区 ' . $data->dan_name;
        $countStatus = 'トータル:' . $entryCounts . '人';
        $slack = new SlackPost();
        $slack->send(":u7533: 参加者ID:$id " . $name . "さんが申込書を作成しました\n
        $belongs \n
        $countStatus\n
        男性: $genderM 名 / 女性: $genderF 名
        ");

        // logger
        Log::info('[申込書作成] ' . $name);

        Flash::success('申込書が作成されました');

        // 確認メール送信
        $sendto = User::where('id', $input['user_id'])->value('email');
        Mail::to($sendto)->queue(new EntryformCreated($name)); // メールをqueueで送信

        return redirect(route('entryForms.index'));
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

        if (empty($entryForm) || $entryForm->user_id <> Auth::user()->id) {
            Flash::error('該当データが見つかりません');

            return redirect(route('entryForms.index'));
        }

        return view('entry_forms.show')->with('entryForm', $entryForm);
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
        $entryForm = entryForm::where('user_id', Auth::user()->id)->first();

        // 生年月日分解
        $entryForm->bd_year =  carbon::parse($entryForm->birth_day)->year;
        $entryForm->bd_month =  carbon::parse($entryForm->birth_day)->month;
        $entryForm->bd_day =  carbon::parse($entryForm->birth_day)->day;

        if (empty($entryForm)) {
            Flash::error('該当データが見つかりません');

            return redirect(route('entryForms.index'));
        }

        return view('entry_forms.edit')->with('entryForm', $entryForm);
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
            Flash::error('当該IDがDBで見つかりません');

            return redirect(route('entryForms.index'));
        }

        // 生年月日生成(制御がかからない!)
        $request['birth_day'] = Carbon::create($request['bd_year'], $request['bd_month'], $request['bd_day']);
        if (!checkdate($request['bd_month'], $request['bd_day'], $request['bd_year'])) {
            // return back()->with('message', '存在しない日付です');
            $messages = '有効な日付';
            return view('entry_forms.edit', compact('messages'));
        }


        $entryForm->fill($request->all());
        $entryForm->save();

        //slack通知
        $id = Auth()->user()->id;
        $name = Auth()->user()->name;
        $slack = new SlackPost();
        $slack->send(":memo: 参加者ID:$id " . $name . "さんが申込書を修正しました");

        // logger
        Log::info('[申込書修正] ' . $name);

        Flash::success('申込書を更新しました。');

        return redirect(route('entryForms.index'));
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
        $entryForm = entryForm::find($id);

        if (empty($entryForm)) {
            Flash::error('Entry Form not found');

            return redirect(route('entryForms.index'));
        }

        $entryForm->delete();

        //slack通知
        $id = Auth()->user()->id;
        $name = Auth()->user()->name;
        $slack = new SlackPost();
        $slack->send(":wastebasket: 参加者ID:$id " . $name . "さんが申込書を削除しました");

        // logger
        Log::info('[申込書削除] ' . $name);

        Flash::success('申込書を削除しました');

        return redirect(route('entryForms.index'));
    }

    public function confirm_index(Request $request)
    {
        // 隊長の承認リンクを踏んだときの処理

        $input = $request->all();

        // ポストされたuuidから該当申込書をピックアップ
        if (isset($input['q'])) {
            $entryForm = entryForm::where('uuid', $input['q'])->firstOrFail();
            // リレーションからユーザーIDを引っ張る
            if ($entryForm) {
                $user = User::where('id', $entryForm->user_id)->first();
                $entryForm->name = $user->name;
            }
        } else {
            $entryForm = new entryForm;
        }

        return view('sm_confirmation.index')
            ->with('entryForm', $entryForm);
    }

    public function confirm_post(Request $request)
    {
        // 隊長が承認ボタンを押したときの処理

        $input = $request->all();

        // ポストされたuuidから該当申込書をピックアップ
        $entryForm = entryForm::where('uuid', $input['confirm'])->first();

        // 承認年月日をcarbonで生成
        $entryForm->sm_confirmation = Carbon::now()->format('Y-m-d H:i:s');

        // DBに保存
        $entryForm->save();

        // メール送信
        // $user = User::select('id', 'email', 'name')->where('id', $entryForm->user_id)->first();
        $user = User::select('id', 'email', 'name')->where('id', $entryForm->user_id)->with('entryform')->first();
        // $user->sm_confirmation = $entryForm->sm_confirmation;
        $sendto = ['email' => $user->email];
        Mail::to($sendto)->queue(new SmConfirm($user));

        // slack通知
        $slack = new SlackPost();
        $slack->send("[団承認] 参加者ID:$user->id " . $user->name . "さんの団承認が完了しました");

        // logger
        Log::info('[団承認] ' . $user->name);

        // flashメッセージを返してリダイレクト
        Flash::success('以下の参加を承認しました。');

        return view('sm_confirmation.index')
            ->with('entryForm', $entryForm);
    }

    public function pdf()
    {
        $entryForm = User::where('id', Auth::id())->with('entryform')->first();
        // dd($entryForm);

        $pdf = \PDF::loadView('entry_forms.pdf', compact('entryForm'));
        $pdf->setPaper('A4');
        return $pdf->download('RS100km_参加申込書.pdf');
        // return $pdf->stream();
    }

    public function id_card()
    {
        $user = User::where('id', Auth::id())->with('entryform')->first();

        $pdf = \PDF::loadView('entry_forms.id_card', compact('user'));
        // $pdf->setPaper('A4');
        // $pdf->setPaper([0, 0, 283, 420], 'landscape'); // 横レイアウト
        $pdf->setPaper([0, 0, 283, 420], 'vertical'); // 縦レイアウト
        // return $pdf->download();
        return $pdf->stream('RS100km_参加IDカード.pdf');
    }

    public function healthcheck()
    {
        // 健康調査票
        $entryForm = User::where('id', Auth::id())->with('entryform')->first();

        $pdf = \PDF::loadView('entry_forms.healthcheck', compact('entryForm'));
        $pdf->setPaper('A4');
        return $pdf->download('RS100km_健康調査票兼Eラーニング修了書.pdf');
    }
}
