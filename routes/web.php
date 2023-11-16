<?php

use App\Http\Controllers\commiEntryFormController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\entryFormController;
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
        Route::resource('entryForms', App\Http\Controllers\entryFormController::class);
        Route::resource('elearnings', App\Http\Controllers\elearningController::class);
        Route::get('/pdf', [entryFormController::class, 'pdf'])->name('pdf');
        Route::get('/id_card', [entryFormController::class, 'id_card'])->name('id_card');
        Route::get('/healthcheck', [entryFormController::class, 'healthcheck'])->name('healthcheck');
    });
    // 管理ユーザ用
    Route::prefix('admin')->middleware('can:admin')->group(function () {
        // Route::get('/', 'Admin\HomeController@index');
        Route::resource('adminConfigs', App\Http\Controllers\AdminConfigController::class);
        Route::resource('adminentries', App\Http\Controllers\adminentryFormController::class, ['except' => 'create']);
        Route::get('non_tokyo', [App\Http\Controllers\adminentryFormController::class, 'non_tokyo'])->name('non_tokyo');
        Route::get('/deleted', [App\Http\Controllers\adminentryFormController::class, 'deleted'])->name('deleted');
        Route::resource('buddylists', App\Http\Controllers\BuddylistController::class);
        Route::get('fee_check', [App\Http\Controllers\adminentryFormController::class, 'fee_check'])->name('fee_check');
        Route::get('registration_check', [App\Http\Controllers\adminentryFormController::class, 'registration_check'])->name('registration_check');
        Route::get('buddy_ok', [App\Http\Controllers\adminentryFormController::class, 'buddy_ok'])->name('buddy_ok');
        Route::get('with_memo', [App\Http\Controllers\adminentryFormController::class, 'with_memo'])->name('with_memo');
        Route::get('id_card', [App\Http\Controllers\adminentryFormController::class, 'id_card'])->name('admin_id_card');
        Route::get('health_check', [App\Http\Controllers\adminentryFormController::class, 'health_check'])->name('health_check');
        Route::get('buddy_confirm', [App\Http\Controllers\adminentryFormController::class, 'buddy_confirm'])->name('buddy_confirm');
        Route::resource('add_users', App\Http\Controllers\addUsersController::class);
        Route::get('/overage', [App\Http\Controllers\adminentryFormController::class, 'overage_filter'])->name('overage_filter');
        Route::get('/buddy_match', [App\Http\Controllers\adminentryFormController::class, 'buddy_match'])->name('buddy_match');
        Route::get('/non_registered', [App\Http\Controllers\adminentryFormController::class, 'non_registered'])->name('non_registered');

        // チェックイン機能
        Route::match(['get', 'post'], '/checkin', [App\Http\Controllers\adminentryFormController::class, 'checkin'])->name('checkin'); // チェックイン機能
        Route::get('/checkin/done', [App\Http\Controllers\adminentryFormController::class, 'checkin_done'])->name('checkin_done'); // チェックイン済み
        Route::get('/checkin/not_yet', [App\Http\Controllers\adminentryFormController::class, 'checkin_not_yet'])->name('checkin_not_yet'); // 未チェックイン
        Route::get('/checkin/delete', [App\Http\Controllers\adminentryFormController::class, 'checkin_delete'])->name('checkin_delete'); // チェックイン削除

        // 確認ステータス
        Route::get('/check_status/', [App\Http\Controllers\adminentryFormController::class, 'check_status'])->name('check_status');

        // Line加入チェック
        Route::match(['get', 'post'], '/line_check', [App\Http\Controllers\adminentryFormController::class, 'line_check'])->name('line_check'); // チェックイン機能
    });

    // スタッフ用
    Route::prefix('staff')->middleware('can:staff')->group(function () {
    });

    // 地区コミ用
    Route::prefix('commi')->middleware('can:commi')->group(function () {
        Route::resource('entries', App\Http\Controllers\commiEntryFormController::class, ['only' => ['index', 'show']]);
        Route::get('commi_check', [App\Http\Controllers\commiEntryFormController::class, 'commi_check'])->name('commi_check');
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

Route::resource('car_registrations', App\Http\Controllers\car_registrationController::class);
Route::get('/car_registration_pdf', [App\Http\Controllers\car_registrationController::class, 'pdf'])->name('car_registration_pdf');
Route::get('/car_registration_publish', [App\Http\Controllers\car_registrationController::class, 'publish'])->name('car_registration_publish');
