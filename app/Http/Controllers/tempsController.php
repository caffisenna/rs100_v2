<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetempsRequest;
use App\Http\Requests\UpdatetempsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\entryForm;
use App\Models\status;
use App\Models\temps;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;

class tempsController extends AppBaseController
{
    /**
     * Display a listing of the temps.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var temps $temps */
        $temps = temps::where('user_id', Auth::user()->id)->first();

        return view('temps.index')
            ->with('temps', $temps);
    }

    /**
     * Show the form for creating a new temps.
     *
     * @return Response
     */
    public function create()
    {
        return view('temps.create');
    }

    /**
     * Store a newly created temps in storage.
     *
     * @param CreatetempsRequest $request
     *
     * @return Response
     */
    public function store(CreatetempsRequest $request)
    {
        $input = $request->all();

        /** @var temps $temps */
        $temps = temps::create($input);

        Flash::success('体温を記録しました');

        return redirect(route('temps.index'));
    }

    /**
     * Display the specified temps.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var temps $temps */
        $temps = temps::find($id);

        if (empty($temps)) {
            Flash::error('Temps not found');

            return redirect(route('temps.index'));
        }

        return view('temps.show')->with('temps', $temps);
    }

    /**
     * Show the form for editing the specified temps.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var temps $temps */
        $temps = temps::find($id);

        if (empty($temps)) {
            Flash::error('Temps not found');

            return redirect(route('temps.index'));
        }

        return view('temps.edit')->with('temps', $temps);
    }

    /**
     * Update the specified temps in storage.
     *
     * @param int $id
     * @param UpdatetempsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetempsRequest $request)
    {
        /** @var temps $temps */
        $temps = temps::find($id);

        if (empty($temps)) {
            Flash::error('Temps not found');

            return redirect(route('temps.index'));
        }

        $temps->fill($request->all());
        $temps->save();

        Flash::success('Temps updated successfully.');

        return redirect(route('temps.index'));
    }

    /**
     * Remove the specified temps from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var temps $temps */
        $temps = temps::find($id);

        if (empty($temps)) {
            Flash::error('Temps not found');

            return redirect(route('temps.index'));
        }

        $temps->delete();

        Flash::success('Temps deleted successfully.');

        return redirect(route('temps.index'));
    }

    public function temp_list()
    {
        $users = entryForm::with('user')->get();
        foreach ($users as $value) {
            $value->temps = temps::where('user_id',$value->user_id)->first();
            $value->times = status::where('user_id',$value->user_id)->first();
        }
        // dd($users);

        return view('admin.temp_lists.index')
            ->with('users', $users);

    }
}
