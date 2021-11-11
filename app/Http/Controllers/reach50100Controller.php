<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createreach50100Request;
use App\Http\Requests\Updatereach50100Request;
use App\Http\Controllers\AppBaseController;
use App\Models\reach50100;
use Illuminate\Http\Request;
use Flash;
use Response;
use app\Models\User;

class reach50100Controller extends AppBaseController
{
    /**
     * Display a listing of the reach50100.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var reach50100 $reach50100s */
        // $reach50100s = reach50100::all();
        // $statuses = status::where('reach_50km_time','<>',null)->orwhere('reach_100km_time','<>',null)->get()->dd();
        $users = User::where(function ($query) {
            $query->where('is_admin', 0)
                ->Where('is_staff', 0)
                ->Where('is_commi', null)
                ->where('email_verified_at', '<>', null);
        })
            ->with('entryform')->with('status')->get();

        return view('reach50100.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new reach50100.
     *
     * @return Response
     */
    public function create()
    {
        return view('reach50100.create');
    }

    /**
     * Store a newly created reach50100 in storage.
     *
     * @param Createreach50100Request $request
     *
     * @return Response
     */
    public function store(Createreach50100Request $request)
    {
        $input = $request->all();

        /** @var reach50100 $reach50100 */
        $reach50100 = reach50100::create($input);

        Flash::success('Reach50100 saved successfully.');

        return redirect(route('reach50100.index'));
    }



    /**
     * Show the form for editing the specified reach50100.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var reach50100 $reach50100 */
        $reach50100 = reach50100::find($id);

        if (empty($reach50100)) {
            Flash::error('Reach50100 not found');

            return redirect(route('reach50100.index'));
        }

        return view('reach50100.edit')->with('reach50100', $reach50100);
    }

    /**
     * Update the specified reach50100 in storage.
     *
     * @param int $id
     * @param Updatereach50100Request $request
     *
     * @return Response
     */
    public function update($id, Updatereach50100Request $request)
    {
        /** @var reach50100 $reach50100 */
        $reach50100 = reach50100::find($id);

        if (empty($reach50100)) {
            Flash::error('Reach50100 not found');

            return redirect(route('reach50100.index'));
        }

        $reach50100->fill($request->all());
        $reach50100->save();

        Flash::success('Reach50100 updated successfully.');

        return redirect(route('reach50100.index'));
    }

    /**
     * Remove the specified reach50100 from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var reach50100 $reach50100 */
        $reach50100 = reach50100::find($id);

        if (empty($reach50100)) {
            Flash::error('Reach50100 not found');

            return redirect(route('reach50100.index'));
        }

        $reach50100->delete();

        Flash::success('Reach50100 deleted successfully.');

        return redirect(route('reach50100.index'));
    }
}
