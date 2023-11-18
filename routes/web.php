<?php

use App\Http\Controllers\commiEntryFormController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\entryFormController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\adminentryFormController;
use App\Http\Controllers\AdminConfigController;
use App\Http\Controllers\BuddylistController;
use App\Http\Controllers\addUsersController;
use App\Http\Controllers\car_registrationController;

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


Route::middleware('verified')->group(function () {
    // 共通
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // 一般ユーザ用
    Route::prefix('user')->group(function () {
        Route::resource('entryForms', entryFormController::class);
        Route::resource('elearnings', elearningController::class);
        Route::get('/pdf', [entryFormController::class, 'pdf'])->name('pdf');
        Route::get('/id_card', [entryFormController::class, 'id_card'])->name('id_card');
        Route::get('/healthcheck', [entryFormController::class, 'healthcheck'])->name('healthcheck');
    });
    // 管理ユーザ用
    Route::prefix('admin')->middleware('can:admin')->group(function () {
        Route::resource('adminConfigs', AdminConfigController::class);
        Route::resource('adminentries', adminentryFormController::class, ['except' => 'create']);
        Route::get('non_tokyo', [adminentryFormController::class, 'non_tokyo'])->name('non_tokyo');
        Route::get('/deleted', [adminentryFormController::class, 'deleted'])->name('deleted');
        Route::resource('buddylists', BuddylistController::class);
        Route::get('fee_check', [adminentryFormController::class, 'fee_check'])->name('fee_check');
        Route::get('registration_check', [adminentryFormController::class, 'registration_check'])->name('registration_check');
        Route::get('buddy_ok', [adminentryFormController::class, 'buddy_ok'])->name('buddy_ok');
        Route::get('with_memo', [adminentryFormController::class, 'with_memo'])->name('with_memo');
        Route::get('id_card', [adminentryFormController::class, 'id_card'])->name('admin_id_card');
        Route::get('health_check', [adminentryFormController::class, 'health_check'])->name('health_check');
        Route::get('buddy_confirm', [adminentryFormController::class, 'buddy_confirm'])->name('buddy_confirm');
        Route::resource('add_users', addUsersController::class);
        Route::get('/overage', [adminentryFormController::class, 'overage_filter'])->name('overage_filter');
        Route::get('/buddy_match', [adminentryFormController::class, 'buddy_match'])->name('buddy_match');
        Route::get('/non_registered', [adminentryFormController::class, 'non_registered'])->name('non_registered');
        Route::match(['get', 'post'], '/regnumber_edit', [adminentryFormController::class, 'regnumber_edit'])->name('regnumber_edit'); // 登録番号修正

        // チェックイン機能
        route::group(['prefix' => 'checkin'], function () {
            Route::match(['get', 'post'], '/', [adminentryFormController::class, 'checkin'])->name('checkin'); // チェックイン機能
            Route::get('/done', [adminentryFormController::class, 'checkin_done'])->name('checkin_done'); // チェックイン済み
            Route::get('/not_yet', [adminentryFormController::class, 'checkin_not_yet'])->name('checkin_not_yet'); // 未チェックイン
            Route::get('/delete', [adminentryFormController::class, 'checkin_delete'])->name('checkin_delete'); // チェックイン削除
        });

        // 確認ステータス
        Route::get('/check_status/', [adminentryFormController::class, 'check_status'])->name('check_status');

        // Line加入チェック
        Route::match(['get', 'post'], '/line_check', [adminentryFormController::class, 'line_check'])->name('line_check'); // チェックイン機能
    });

    // スタッフ用
    Route::prefix('staff')->middleware('can:staff')->group(function () {
    });

    // 地区コミ用
    Route::prefix('commi')->middleware('can:commi')->group(function () {
        Route::resource('entries', commiEntryFormController::class, ['only' => ['index', 'show']]);
        Route::get('commi_check', [commiEntryFormController::class, 'commi_check'])->name('commi_check');
    });
});

Route::get('/sm_confirm', [
    entryFormController::class, 'confirm_index'
    // {url}/sm_confirm/?q=12345 の形式で投げる
]);

Route::post('/sm_confirm', [
    entryFormController::class, 'confirm_post'
])->name('comfirm_post');


Route::get('/hq_confirm', [
    App\Http\Controllers\adminentryFormController::class, 'hq_confirm'
])->name('hq_comfirm');

// 駐車許可証発行
Route::resource('car_registrations', car_registrationController::class);
Route::get('/car_registration_pdf', [car_registrationController::class, 'pdf'])->name('car_registration_pdf');
Route::get('/car_registration_publish', [car_registrationController::class, 'publish'])->name('car_registration_publish');
