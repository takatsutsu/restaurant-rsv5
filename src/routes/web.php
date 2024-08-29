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
Route::get('/email_form', [EmailController::class, 'email_form']);
Route::post('/send_email', [EmailController::class, 'send_email']);

Route::middleware('auth')->group(function () {

    // メール認証済みのユーザー向けルート
    Route::middleware('verified')->group(function () {
        Route::post('/reserve_store', [ReserveController::class, 'reserve_store']);
        Route::post('/reserve_delete', [ReserveController::class, 'reserve_delete']);
        Route::get('/favo_store/{id}', [FavoriteController::class, 'favo_store']);
        Route::get('/favo_delete/{id}', [FavoriteController::class, 'favo_delete']);
        Route::get('/my_favo_delete/{id}', [FavoriteController::class, 'my_favo_delete']);
        Route::get('/my_page', [My_pageController::class, 'my_page']);
        Route::get('/reserve_edit/{id}', [ReserveController::class, 'reserve_edit']);
        Route::post('/reserve_update', [ReserveController::class, 'reserve_update']);
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



