<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReserveController;
use App\Models\Favorite;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/user_complete', [AuthController::class, 'user_complete']);
Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{id}', [ShopController::class, 'detail']);


Route::middleware('auth')->group(function () {
    Route::post('/reserve_store', [ReserveController::class, 'reserve_store']);
    Route::get('/favo_store/{id}', [FavoriteController::class, 'favo_store']);
    Route::get('/favo_delete/{id}', [FavoriteController::class, 'favo_delete']);
});