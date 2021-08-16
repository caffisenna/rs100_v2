<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/home', [
    HomeController::class, 'index'
])->name('home')->middleware('verified');

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
Route::get('/profile', function () {
})->middleware('verified');


Route::resource('adminConfigs', App\Http\Controllers\AdminConfigController::class)
->middleware('auth');
