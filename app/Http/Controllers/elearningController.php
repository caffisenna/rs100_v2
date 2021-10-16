<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateelearningRequest;
use App\Http\Requests\UpdateelearningRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\elearning;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use App\Models\entryForm;
use App\Http\Util\SlackPost;

class elearningController extends AppBaseController
{
    /**
     * Display a listing of the elearning.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var elearning $elearnings */
        // $elearnings = elearning::all();
        // Eランの受講状況をチェック
        $elearning = elearning::where('user_id', Auth::user()->id)->first();

        // 申込書の作成状況をチェック
        $entryform = entryForm::where('user_id', Auth::user()->id)->first();

        if (is_null($elearning)) {
            $elearning = new elearning;
        }

        return view('elearnings.index')
            ->with('elearning', $elearning);
    }

    /**
     * Show the form for creating a new elearning.
     *
     * @return Response
     */
    public function create()
    {
        return view('elearnings.create');
    }

    /**
     * Store a newly created elearning in storage.
     *
     * @param CreateelearningRequest $request
     *
     * @return Response
     */
    // public function store(CreateelearningRequest $request)
    // store(CreateelearningRequest $request) のままだと自由にエラーメッセージを
    // コントロールできないので旧来の方法に迂回する
    // 迂回することでコントローラー部で制御可能に
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth()->user()->id;

        $rules = [
            'q1' => 'in:1|required',
            'q2' => 'in:1|required',
            'q3' => 'in:3|required',
            'q4' => 'in:2|required',
        ];

        $messages = [
            'q1.in' => 'Q1 不正解です',
            'q2.in' => 'Q2 不正解です',
            'q3.in' => 'Q3 不正解です',
            'q4.in' => 'Q4 不正解です',
            'q1.required' => 'Q1 選択肢より選択してください',
            'q2.required' => 'Q2 選択肢より選択してください',
            'q3.required' => 'Q3 選択肢より選択してください',
            'q4.required' => 'Q4 選択肢より選択してください',
        ];

        $validation = \Validator::make($input,$rules,$messages);

        //エラー時の処理
		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation->errors())->withInput();
		}

        /** @var elearning $elearning */
        $elearning = elearning::create($input);

        //slack通知
        $id = Auth()->user()->id;
        $name = Auth()->user()->name;
        $slack = new SlackPost();
        $slack->send(":100:[Eラン] 参加者ID:$id " . $name . "さんがEラン合格");

        Flash::success('全問正解! 合格です!');

        return redirect(route('elearnings.index'));
    }

    /**
     * Display the specified elearning.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var elearning $elearning */
        $elearning = elearning::find($id);

        if (empty($elearning)) {
            Flash::error('Elearning not found');

            return redirect(route('elearnings.index'));
        }

        return view('elearnings.show')->with('elearning', $elearning);
    }

    /**
     * Show the form for editing the specified elearning.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var elearning $elearning */
        $elearning = elearning::find($id);

        if (empty($elearning)) {
            Flash::error('Elearning not found');

            return redirect(route('elearnings.index'));
        }

        return view('elearnings.edit')->with('elearning', $elearning);
    }

    /**
     * Update the specified elearning in storage.
     *
     * @param int $id
     * @param UpdateelearningRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateelearningRequest $request)
    {
        /** @var elearning $elearning */
        $elearning = elearning::find($id);

        if (empty($elearning)) {
            Flash::error('Elearning not found');

            return redirect(route('elearnings.index'));
        }

        $elearning->fill($request->all());
        $elearning->save();

        Flash::success('Elearning updated successfully.');

        return redirect(route('elearnings.index'));
    }

    /**
     * Remove the specified elearning from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var elearning $elearning */
        $elearning = elearning::find($id);

        if (empty($elearning)) {
            Flash::error('Elearning not found');

            return redirect(route('elearnings.index'));
        }

        $elearning->delete();

        Flash::success('受講歴を削除しました。');

        return redirect(route('elearnings.index'));
    }
}
