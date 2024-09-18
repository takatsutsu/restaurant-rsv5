<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\My_pageController;
use App\Models\Favorite;
use App\Http\Controllers\LoginController;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\EmailController;


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
// routes/web.php
// Route::get('/user_complete', [AuthController::class, 'user_complete']);

Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{id}', [ShopController::class, 'detail']);
Route::post('/search', [ShopController::class, 'search']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/send_email', [EmailController::class, 'send_email']);

Route::middleware('auth')->group(function () {

    // メール認証済みのユーザー向けルート
    Route::middleware('verified')->group(function () {
        //予約登録
        Route::post('/reserve_store', [ReserveController::class, 'reserve_store']);
        //予約削除
        Route::post('/reserve_delete', [ReserveController::class, 'reserve_delete']);
        //お気に入り登録（店舗情報画面から）
        Route::get('/favo_store/{id}', [FavoriteController::class, 'favo_store']);
        //お気に入り削除（店舗情報画面から）
        Route::get('/favo_delete/{id}', [FavoriteController::class, 'favo_delete']);
        //お気に入り削除（マイページから）
        Route::get('/my_favo_delete/{id}', [FavoriteController::class, 'my_favo_delete']);
        //マイページ表示
        Route::get('/my_page', [My_pageController::class, 'my_page']);
        //予約情報変更画面
        Route::get('/reserve_edit/{id}', [ReserveController::class, 'reserve_edit']);
        Route::post('/reserve_update', [ReserveController::class, 'reserve_update']);
        //お知らせメールの送信フォーム
        Route::get('/email_form', [EmailController::class, 'email_form']);
        //店舗管理者の登録画面
        Route::get('/shop_admin_form', [RegisterController::class, 'shop_admin_form']);
        Route::post('/shop_admin_register', [RegisterController::class, 'shop_admin_register']);
        //店舗情報の更新画面
        Route::get('/shop_edit', [ShopController::class, 'shop_edit']);
        Route::post('/shop_update', [ShopController::class, 'shop_update']);
        //店舗情報の登録画面
        Route::get('/shop_form', [ShopController::class, 'shop_form']);
        Route::post('/shop_store', [ShopController::class, 'shop_store']);
        //店舗別予約一覧
        Route::get('/shop_reserve', [ReserveController::class, 'shop_reserve']);
        Route::get('/reserve_qr/{id}', [ReserveController::class, 'reserve_qr']);
        //店舗における予約照合
        Route::get('/reserve_match/{id}', [ReserveController::class, 'reserve_match']);
    });
    // メール認証が必要なユーザー向けルート
    Route::get('/email/verify', function () {
        return view('auth.user_thanks');
    })->name('verification.notice');

    Route::get('/user_thanks',
        function () {
            return view('auth.user_thanks');
        }
    )->name('registration.success');


    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});



