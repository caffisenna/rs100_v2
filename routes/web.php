<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\entryFormController;
use App\Http\Controllers\statusController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Auth::routes(['verify' => true]);

// Route::get('/home', [
//     HomeController::class, 'index'
// ])->name('home')->middleware('verified');

// メール確認の通知
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// メール確認
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// メール確認の再送信
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'メール送信が完了しました。');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// 確認済みのユーザーのみがこのルートにアクセス可能
// Route::get('/profile', function () {
// })->middleware('verified');


Route::middleware('verified')->group(function () {
    // 共通
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // 一般ユーザ用
    Route::prefix('user')->group(function () {
        // Route::get('/', 'User\HomeController@index');
        Route::resource('entryForms', App\Http\Controllers\entryFormController::class);
        Route::resource('elearnings', App\Http\Controllers\elearningController::class);
        Route::resource('resultUploads', App\Http\Controllers\resultUploadController::class);
        Route::resource('planUploads', App\Http\Controllers\planUploadController::class, ['except' => ['edit','show','update']]);
        Route::resource('temps', App\Http\Controllers\tempsController::class);
        Route::get('/status_update', [
            App\Http\Controllers\statusController::class, 'status_update'
        ])->name('status_update');
        Route::resource('resultInputs', App\Http\Controllers\resultInputsController::class);
    });
    // 管理ユーザ用
    Route::prefix('admin')->middleware('can:admin')->group(function () {
        // Route::get('/', 'Admin\HomeController@index');
        Route::resource('adminConfigs', App\Http\Controllers\AdminConfigController::class);
        Route::resource('adminentries', App\Http\Controllers\adminentryFormController::class, ['except' => 'create']);
        Route::get('/deleted', [App\Http\Controllers\adminentryFormController::class, 'deleted'])->name('deleted');
        Route::resource('adminresultUploads', App\Http\Controllers\adminresultUploadController::class, ['except' => 'create']);
        Route::get('/result_lists', [App\Http\Controllers\adminresultUploadController::class, 'lists'])->name('resultlists');
        Route::get('/temp_lists', [App\Http\Controllers\tempsController::class, 'temp_list'])->name('templists');
        Route::resource('reach50100', App\Http\Controllers\reach50100Controller::class);
        Route::resource('planUploads', App\Http\Controllers\adminplanUploadController::class, ['except' => ['create','edit','show','update']]);
    });
    // 地区コミ用
    Route::prefix('commi')->middleware('can:commi')->group(function () {
        Route::resource('entries', App\Http\Controllers\commiEntryFormController::class, ['only' => ['index', 'show']]);
    });
});

Route::get('/sm_confirm', [
    entryFormController::class, 'confirm_index'
    // {url}/sm_confirm/?q=12345 の形式で投げる
]);

Route::post('/sm_confirm', [
    entryFormController::class, 'confirm_post'
])->name('comfirm_post');


Route::resource('status', App\Http\Controllers\statusController::class);

Route::get('/hq_confirm', [
    App\Http\Controllers\adminentryFormController::class, 'hq_confirm'
])->name('hq_comfirm');

Route::get('/plan_check', [
    App\Http\Controllers\adminplanUploadController::class, 'check'
])->name('plan_upload');
