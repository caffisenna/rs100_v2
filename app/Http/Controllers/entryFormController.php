<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateentryFormRequest;
use App\Http\Requests\UpdateentryFormRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\entryForm;
use Auth;
use Illuminate\Http\Request;
use Flash;
use Response;

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
        $entryForm = entryForm::where('user_id',Auth::user()->id)->first();
        // dd($entryForm);

        if(is_null($entryForm)){
			$entryForm = new entryForm;
        }

        return view('entry_forms.index')
            ->with('entryForm', $entryForm);
    }

    /**
     * Show the form for creating a new entryForm.
     *
     * @return Response
     */
    public function create()
    {
        return view('entry_forms.create');
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

        /** @var entryForm $entryForm */
        $entryForm = entryForm::create($input);

        Flash::success('Entry Form saved successfully.');

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

        if (empty($entryForm)) {
            Flash::error('Entry Form not found');

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
        $entryForm = entryForm::find($id);

        if (empty($entryForm)) {
            Flash::error('Entry Form not found');

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
            Flash::error('Entry Form not found');

            return redirect(route('entryForms.index'));
        }

        $entryForm->fill($request->all());
        $entryForm->save();

        Flash::success('Entry Form updated successfully.');

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

        Flash::success('Entry Form deleted successfully.');

        return redirect(route('entryForms.index'));
    }
}
