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

Route::get('/user_complete', [AuthController::class, 'user_complete']);
Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{id}', [ShopController::class, 'detail']);
Route::post('/search', [ShopController::class, 'search']);
Route::post('/login', [LoginController::class, 'login'])->name('login');



Route::middleware('auth')->group(function () {
    Route::post('/reserve_store', [ReserveController::class, 'reserve_store']);
    Route::post('/reserve_delete', [ReserveController::class, 'reserve_delete']);
    Route::get('/favo_store/{id}', [FavoriteController::class, 'favo_store']);
    Route::get('/favo_delete/{id}', [FavoriteController::class, 'favo_delete']);
    Route::get('/my_favo_delete/{id}', [FavoriteController::class, 'my_favo_delete']);
    Route::get('/my_page', [My_pageController::class, 'my_page']);

});