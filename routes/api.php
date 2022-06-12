<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarketersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'loginAccount']);
Route::post('register', [AuthController::class, 'createAccount']);

Route::group(['middleware' => 'checkToken'], function () {
    Route::post('marketer', [MarketersController::class, 'getByID']);
    Route::post('withdrawals', [MarketersController::class, 'withdrawal']);
    Route::post('payout', [MarketersController::class, 'payout']);
    Route::post('update-payout', [MarketersController::class, 'updatePayout']);
    Route::post('update-profile', [MarketersController::class, 'updateProfile']);
});
