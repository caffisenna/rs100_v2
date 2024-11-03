<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateRequest;
use App\Http\Requests\UpdateUpdateRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\UpdateRepository;
use Illuminate\Http\Request;
use Flash;

class UpdateController extends AppBaseController
{
    /** @var UpdateRepository $updateRepository*/
    private $updateRepository;

    public function __construct(UpdateRepository $updateRepo)
    {
        $this->updateRepository = $updateRepo;
    }

    /**
     * Display a listing of the Update.
     */
    public function index(Request $request)
    {
        $updates = $this->updateRepository->paginate(10);

        return view('updates.index')
            ->with('updates', $updates);
    }

    /**
     * Show the form for creating a new Update.
     */
    public function create()
    {
        return view('updates.create');
    }

    /**
     * Store a newly created Update in storage.
     */
    public function store(CreateUpdateRequest $request)
    {
        $input = $request->all();

        $update = $this->updateRepository->create($input);

        Flash::success('Update saved successfully.');

        return redirect(route('updates.index'));
    }

    /**
     * Display the specified Update.
     */
    public function show($id)
    {
        $update = $this->updateRepository->find($id);

        if (empty($update)) {
            Flash::error('Update not found');

            return redirect(route('updates.index'));
        }

        return view('updates.show')->with('update', $update);
    }

    /**
     * Show the form for editing the specified Update.
     */
    public function edit($id)
    {
        $update = $this->updateRepository->find($id);

        if (empty($update)) {
            Flash::error('Update not found');

            return redirect(route('updates.index'));
        }

        return view('updates.edit')->with('update', $update);
    }

    /**
     * Update the specified Update in storage.
     */
    public function update($id, UpdateUpdateRequest $request)
    {
        $update = $this->updateRepository->find($id);

        if (empty($update)) {
            Flash::error('Update not found');

            return redirect(route('updates.index'));
        }

        $update = $this->updateRepository->update($request->all(), $id);

        Flash::success('Update updated successfully.');

        return redirect(route('updates.index'));
    }

    /**
     * Remove the specified Update from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $update = $this->updateRepository->find($id);

        if (empty($update)) {
            Flash::error('Update not found');

            return redirect(route('updates.index'));
        }

        $this->updateRepository->delete($id);

        Flash::success('Update deleted successfully.');

        return redirect(route('updates.index'));
    }
}
