<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateaddUsersRequest;
use App\Http\Requests\UpdateaddUsersRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\addUsersRepository;
use Illuminate\Http\Request;
use Flash;
use App\Models\User;

class addUsersController extends AppBaseController
{
    /** @var addUsersRepository $addUsersRepository*/
    private $addUsersRepository;

    public function __construct(addUsersRepository $addUsersRepo)
    {
        $this->addUsersRepository = $addUsersRepo;
    }

    /**
     * Display a listing of the addUsers.
     */
    public function index(Request $request)
    {
        // 一般ユーザーは取得しない
        $users = User::where('is_admin', 1)
            ->orWhere('is_commi', '<>', NULL)->get();

        return view('add_users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new addUsers.
     */
    public function create()
    {
        return view('add_users.create');
    }

    /**
     * Store a newly created addUsers in storage.
     */
    public function store(CreateaddUsersRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']); // hash可
        $input['email_verified_at'] = now();
        if ($input['role'] == 'admin') {
            $input['is_admin'] = 1;
        }

        $addUsers = user::create($input);

        Flash::success('ユーザーを登録しました');

        return redirect(route('add_users.index'));
    }

    /**
     * Display the specified addUsers.
     */
    public function show($id)
    {
        // $addUsers = $this->addUsersRepository->find($id);
        $addUsers = user::find($id);

        if (empty($addUsers)) {
            Flash::error('アカウントが見つかりません');

            return redirect(route('add_users.index'));
        }

        return view('add_users.show')->with('addUsers', $addUsers);
    }

    /**
     * Show the form for editing the specified addUsers.
     */
    public function edit($id)
    {
        // $addUsers = $this->addUsersRepository->find($id);
        $addUsers = user::find($id);

        if (empty($addUsers)) {
            Flash::error('アカウントが見つかりません');

            return redirect(route('add_users.index'));
        }

        return view('add_users.edit')->with('addUsers', $addUsers);
    }

    /**
     * Update the specified addUsers in storage.
     */
    public function update($id, UpdateaddUsersRequest $request)
    {
        $addUsers = $this->addUsersRepository->find($id);

        if (empty($addUsers)) {
            Flash::error('アカウントが見つかりません');

            return redirect(route('add_users.index'));
        }

        $addUsers = $this->addUsersRepository->update($request->all(), $id);

        Flash::success('アカウントを更新しました');

        return redirect(route('add_sers.index'));
    }

    /**
     * Remove the specified addUsers from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        // $addUsers = $this->addUsersRepository->find($id);
        $addUsers = user::find($id);

        if (empty($addUsers)) {
            Flash::error('アカウントが見つかりません');

            return redirect(route('add_users.index'));
        }

        // $this->addUsersRepository->delete($id);
        $addUsers->delete($id);

        Flash::success('アカウントを削除しました');

        return redirect(route('add_users.index'));
    }
}
