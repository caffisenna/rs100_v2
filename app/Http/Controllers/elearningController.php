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
        $elearning = elearning::where('user_id',Auth::user()->id)->first();

        if(is_null($elearning)){
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
    public function store(CreateelearningRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth()->user()->id;

        /** @var elearning $elearning */
        $elearning = elearning::create($input);

        Flash::success('Elearning saved successfully.');

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

        Flash::success('Elearning deleted successfully.');

        return redirect(route('elearnings.index'));
    }
}
