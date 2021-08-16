<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdminConfigRequest;
use App\Http\Requests\UpdateAdminConfigRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\AdminConfig;
use Illuminate\Http\Request;
use Flash;
use Response;

class AdminConfigController extends AppBaseController
{
    /**
     * Display a listing of the AdminConfig.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var AdminConfig $adminConfigs */
        $adminConfigs = AdminConfig::all();

        return view('admin_configs.index')
            ->with('adminConfigs', $adminConfigs);
    }

    /**
     * Show the form for creating a new AdminConfig.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin_configs.create');
    }

    /**
     * Store a newly created AdminConfig in storage.
     *
     * @param CreateAdminConfigRequest $request
     *
     * @return Response
     */
    public function store(CreateAdminConfigRequest $request)
    {
        $input = $request->all();

        /** @var AdminConfig $adminConfig */
        $adminConfig = AdminConfig::create($input);

        Flash::success('Admin Config saved successfully.');

        return redirect(route('adminConfigs.index'));
    }

    /**
     * Display the specified AdminConfig.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AdminConfig $adminConfig */
        $adminConfig = AdminConfig::find($id);

        if (empty($adminConfig)) {
            Flash::error('Admin Config not found');

            return redirect(route('adminConfigs.index'));
        }

        return view('admin_configs.show')->with('adminConfig', $adminConfig);
    }

    /**
     * Show the form for editing the specified AdminConfig.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var AdminConfig $adminConfig */
        $adminConfig = AdminConfig::find($id);

        if (empty($adminConfig)) {
            Flash::error('Admin Config not found');

            return redirect(route('adminConfigs.index'));
        }

        return view('admin_configs.edit')->with('adminConfig', $adminConfig);
    }

    /**
     * Update the specified AdminConfig in storage.
     *
     * @param int $id
     * @param UpdateAdminConfigRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdminConfigRequest $request)
    {
        /** @var AdminConfig $adminConfig */
        $adminConfig = AdminConfig::find($id);

        if (empty($adminConfig)) {
            Flash::error('Admin Config not found');

            return redirect(route('adminConfigs.index'));
        }

        $adminConfig->fill($request->all());
        $adminConfig->save();

        Flash::success('Admin Config updated successfully.');

        return redirect(route('adminConfigs.index'));
    }

    /**
     * Remove the specified AdminConfig from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AdminConfig $adminConfig */
        $adminConfig = AdminConfig::find($id);

        if (empty($adminConfig)) {
            Flash::error('Admin Config not found');

            return redirect(route('adminConfigs.index'));
        }

        $adminConfig->delete();

        Flash::success('Admin Config deleted successfully.');

        return redirect(route('adminConfigs.index'));
    }
}
