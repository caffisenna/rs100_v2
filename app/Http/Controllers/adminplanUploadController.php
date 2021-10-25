<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateplanUploadRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\planUpload;
use Illuminate\Http\Request;
use Flash;
use Response;
use Auth;
use File;
use App\Http\Util\SlackPost;
use App\Models\entryForm;
use App\Models\User;
use Carbon\Carbon;

class adminplanUploadController extends AppBaseController
{
    /**
     * Display a listing of the planUpload.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var planUpload $planUploads */
        // 当該IDのみ抽出
        $users = User::where(function ($query) {
            $query->where('is_admin', 0)
                ->Where('is_staff', 0)
                ->Where('is_commi', null)
                ->where('email_verified_at', '<>', null);
        })
            ->with('entryform')->with('planupload')->get();

        return view('admin.plan_uploads.index')
            ->with('users', $users);
    }

    public function check(Request $request)
    {
        // dd($request->id);
        $db = planUpload::find($request->id);
        $db->checked_at = carbon::now();
        $db->save();
        return back();
    }

}
