<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateresultInputsRequest;
use App\Http\Requests\UpdateresultInputsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\resultInputs;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Http\Util\SlackPost;

class resultInputsController extends AppBaseController
{
    /**
     * Display a listing of the resultInputs.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var resultInputs $resultInputs */
        $resultInputs = resultInputs::all();

        return view('result_inputs.index')
            ->with('resultInputs', $resultInputs);
    }

    /**
     * Show the form for creating a new resultInputs.
     *
     * @return Response
     */
    public function create()
    {
        return view('result_inputs.create');
    }

    /**
     * Store a newly created resultInputs in storage.
     *
     * @param CreateresultInputsRequest $request
     *
     * @return Response
     */
    public function store(CreateresultInputsRequest $request)
    {
        $input = $request->all();
        dd($input);

        /** @var resultInputs $resultInputs */
        $resultInputs = resultInputs::create($input);

        //slack通知
        $id = Auth()->user()->id;
        $name = Auth()->user()->name;
        $slack = new SlackPost();
        $slack->send(":memo: 参加者ID:$id " . $name . "さんが歩行記録を入力しました");

        Flash::success('歩行結果を登録しました');

        return redirect(route('resultInputs.index'));
    }

    /**
     * Display the specified resultInputs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var resultInputs $resultInputs */
        $resultInputs = resultInputs::find($id);

        if (empty($resultInputs)) {
            Flash::error('Result Inputs not found');

            return redirect(route('resultInputs.index'));
        }

        return view('result_inputs.show')->with('resultInputs', $resultInputs);
    }

    /**
     * Show the form for editing the specified resultInputs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var resultInputs $resultInputs */
        $resultInputs = resultInputs::find($id);

        if (empty($resultInputs)) {
            Flash::error('Result Inputs not found');

            return redirect(route('resultInputs.index'));
        }

        return view('result_inputs.edit')->with('resultInputs', $resultInputs);
    }

    /**
     * Update the specified resultInputs in storage.
     *
     * @param int $id
     * @param UpdateresultInputsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateresultInputsRequest $request)
    {
        /** @var resultInputs $resultInputs */
        $resultInputs = resultInputs::find($id);

        if (empty($resultInputs)) {
            Flash::error('Result Inputs not found');

            return redirect(route('resultInputs.index'));
        }

        $resultInputs->fill($request->all());
        $resultInputs->save();

        Flash::success('Result Inputs updated successfully.');

        return redirect(route('resultInputs.index'));
    }

    /**
     * Remove the specified resultInputs from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var resultInputs $resultInputs */
        $resultInputs = resultInputs::find($id);

        if (empty($resultInputs)) {
            Flash::error('Result Inputs not found');

            return redirect(route('resultInputs.index'));
        }

        $resultInputs->delete();

        Flash::success('削除しました');

        return redirect(route('resultInputs.index'));
    }
}
