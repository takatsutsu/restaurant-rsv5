<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
//店舗一覧
Route::get('/', [ShopController::class, 'index']);
//店舗詳細画面予約入力
Route::get('/detail/{id}', [ShopController::class, 'detail']);
//店舗検索
Route::post('/shop_search', [ShopController::class, 'shop_search']);
//ログイン画面
Route::post('/login', [LoginController::class, 'login']);
//一般ユーザ登録画面
Route::post('/register_store', [RegisterController::class, 'register_store']);


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
        Route::get('/my_page', [MyPageController::class, 'my_page']);
        //予約情報変更ページ表示
        Route::get('/reserve_edit/{id}', [ReserveController::class, 'reserve_edit']);
        //予約情報変更処理
        Route::post('/reserve_update', [ReserveController::class, 'reserve_update']);
        //お知らせメールの送信ページ
        Route::get('/email_form', [EmailController::class, 'email_form']);
        //お知らせメール送信処理
        Route::post('/send_email', [EmailController::class, 'send_email']);
        //店舗管理者の登録ページ表示
        Route::get('/shop_admin_register', [RegisterController::class, 'shop_admin_register']);
        Route::post('/shop_admin_store', [RegisterController::class, 'shop_admin_store']);
        //店舗情報の更新ページ表示
        Route::get('/shop_edit', [ShopController::class, 'shop_edit']);
        Route::post('/shop_update', [ShopController::class, 'shop_update']);
        //店舗情報の登録ページ表示
        Route::get('/shop_new', [ShopController::class, 'shop_new']);
        Route::post('/shop_store', [ShopController::class, 'shop_store']);
        //店舗別予約一覧ページ表示
        Route::get('/shop_reserve', [ReserveController::class, 'shop_reserve']);
        //予約一情報qrコード表示
        Route::get('/reserve_qr/{id}', [ReserveController::class, 'reserve_qr']);
        //店舗における予約照合
        Route::get('/reserve_match/{id}', [ReserveController::class, 'reserve_match']);

    });
    //メール認証未完了の場合のルート
    Route::get('/email/verify', function () {
        return view('auth.user_thanks');
    })->name('verification.notice');
    //会員登録時認証メール送信処理
    Route::get('/user_thanks',
        function () {
            return view('auth.user_thanks');
        })->name('registration.success');

    //会員登録時認証メール再送信
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', '認証メールを再送しました。');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});



