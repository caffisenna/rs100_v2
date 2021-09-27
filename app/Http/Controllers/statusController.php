<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestatusRequest;
use App\Http\Requests\UpdatestatusRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\status;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\User;
use App\Models\entryForm;
use App\Models\resultUpload;
use Carbon\Carbon;

class statusController extends AppBaseController
{
    /**
     * Display a listing of the status.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var status $statuses */
        $statuses = status::all();

        foreach ($statuses as $value) {
            $tmp = User::where('id', $value['user_id'])->select('name')->first();
            $value['name'] = $tmp->name;
            $tmp = entryForm::where('user_id', $value['user_id'])->select('district', 'dan_name')->first();
            $value['dan'] = $tmp->district . "/" . $tmp->dan_name;

            if (empty($value['day1_start_time'])) {
                $value['day1_start_time'] = '2021-11-13 07:00:00';
            }

            if (empty($value['day2_start_time'])) {
                $value['day2_start_time'] = '2021-11-14 07:00:00';
            }

            // 時間差
            if (!empty($value['day1_end_time'])) {
                $t1s = new Carbon($value['day1_start_time']);
                $t1e = new Carbon($value['day1_end_time']);
                $diff1 = $t1s->diffInSeconds($t1e);
                $t2s = new Carbon($value['day2_start_time']);
                $t2e = new Carbon($value['day2_end_time']);
                $diff2 = $t2s->diffInSeconds($t2e);
                $d = $diff1 + $diff2;
                $hours = floor($d / 3600); //時間
                $minutes = floor(($d / 60) % 60); //分
                $seconds = floor($d % 60); //秒
                $value['hms'] = sprintf("%2d:%02d:%02d", $hours, $minutes, $seconds);
            }

            // 歩行距離
            $d1 = resultUpload::where('user_id',$value['user_id'])->where('day',1)->sum('distance');
            $d2 = resultUpload::where('user_id',$value['user_id'])->where('day',2)->sum('distance');
            $value['day1_distance'] = $d1; // 1日目
            $value['day2_distance'] = $d2; // 2日目
            $value['distance_total'] = $d1 + $d2; // トータル

            // 画像枚数
            $value['up'] = resultUpload::where('user_id',$value['user_id'])->count();

        }

        return view('status.index')
            ->with('statuses', $statuses);
    }

    /**
     * Show the form for creating a new status.
     *
     * @return Response
     */
    public function create()
    {
        return view('status.create');
    }

    /**
     * Store a newly created status in storage.
     *
     * @param CreatestatusRequest $request
     *
     * @return Response
     */
    public function store(CreatestatusRequest $request)
    {
        $input = $request->all();

        /** @var status $status */
        $status = status::create($input);

        Flash::success('Status saved successfully.');

        return redirect(route('status.index'));
    }

    /**
     * Display the specified status.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var status $status */
        $status = status::find($id);

        if (empty($status)) {
            Flash::error('Status not found');

            return redirect(route('status.index'));
        }

        return view('status.show')->with('status', $status);
    }

    /**
     * Show the form for editing the specified status.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var status $status */
        $status = status::find($id);

        if (empty($status)) {
            Flash::error('Status not found');

            return redirect(route('status.index'));
        }

        return view('status.edit')->with('status', $status);
    }

    /**
     * Update the specified status in storage.
     *
     * @param int $id
     * @param UpdatestatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestatusRequest $request)
    {
        /** @var status $status */
        $status = status::find($id);

        if (empty($status)) {
            Flash::error('Status not found');

            return redirect(route('status.index'));
        }

        $status->fill($request->all());
        $status->save();

        Flash::success('Status updated successfully.');

        return redirect(route('status.index'));
    }

    /**
     * Remove the specified status from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var status $status */
        $status = status::find($id);

        if (empty($status)) {
            Flash::error('Status not found');

            return redirect(route('status.index'));
        }

        $status->delete();

        Flash::success('Status deleted successfully.');

        return redirect(route('status.index'));
    }
}
