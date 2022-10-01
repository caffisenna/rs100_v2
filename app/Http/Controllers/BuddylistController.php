<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBuddylistRequest;
use App\Http\Requests\UpdateBuddylistRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Buddylist;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\entryForm;
use App\Models\User;

class BuddylistController extends AppBaseController
{
    /**
     * Display a listing of the Buddylist.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Buddylist $buddylists */
        $buddylists = Buddylist::all();
        foreach ($buddylists as $value) {
            $entryform = entryForm::where('zekken',$value['person1'])->first();
            @$value['person1_name'] = User::where('id',$entryform->user_id)->value('name');
            @$value['person1_dan_name'] = $entryform->dan_name;
            @$value['person1_gender'] = $entryform->gender;
            @$entryform = entryForm::where('zekken',$value['person2'])->first();
            @$value['person2_name'] = User::where('id',$entryform->user_id)->value('name');
            @$value['person2_dan_name'] = $entryform->dan_name;
            @$value['person2_gender'] = $entryform->gender;
            @$entryform = entryForm::where('zekken',$value['person3'])->first();
            @$value['person3_name'] = User::where('id',$entryform->user_id)->value('name');
            @$value['person3_dan_name'] = $entryform->dan_name;
            @$value['person3_gender'] = $entryform->gender;
        }

        return view('admin.buddylists.index')
            ->with('buddylists', $buddylists);
    }

    /**
     * Show the form for creating a new Buddylist.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.buddylists.create');
    }

    /**
     * Store a newly created Buddylist in storage.
     *
     * @param CreateBuddylistRequest $request
     *
     * @return Response
     */
    public function store(CreateBuddylistRequest $request)
    {
        $input = $request->all();

        /** @var Buddylist $buddylist */
        $buddylist = Buddylist::create($input);

        Flash::success('バディ情報を登録しました');

        return redirect(route('buddylists.index'));
    }

    /**
     * Display the specified Buddylist.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Buddylist $buddylist */
        $buddylist = Buddylist::find($id);

        if (empty($buddylist)) {
            Flash::error('Buddylist not found');

            return redirect(route('admin.buddylists.index'));
        }

        return view('admin.buddylists.show')->with('buddylist', $buddylist);
    }

    /**
     * Show the form for editing the specified Buddylist.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Buddylist $buddylist */
        $buddylist = Buddylist::find($id);

        if (empty($buddylist)) {
            Flash::error('該当バディが見つかりません。');

            return redirect(route('admin.buddylists.index'));
        }

        return view('admin.buddylists.edit')->with('buddylist', $buddylist);
    }

    /**
     * Update the specified Buddylist in storage.
     *
     * @param int $id
     * @param UpdateBuddylistRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBuddylistRequest $request)
    {
        /** @var Buddylist $buddylist */
        $buddylist = Buddylist::find($id);

        if (empty($buddylist)) {
            Flash::error('該当バディが見つかりません。');

            return redirect(route('admin.buddylists.index'));
        }

        $buddylist->fill($request->all());
        $buddylist->save();

        Flash::success('バディを更新しました');

        return redirect(route('buddylists.index'));
    }

    /**
     * Remove the specified Buddylist from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Buddylist $buddylist */
        $buddylist = Buddylist::find($id);

        if (empty($buddylist)) {
            Flash::error('該当バディが見つかりません。');

            return redirect(route('buddylists.index'));
        }

        $buddylist->delete();

        Flash::success('バディを削除しました');

        return redirect(route('buddylists.index'));
    }
}
