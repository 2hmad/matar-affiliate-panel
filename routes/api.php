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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'loginAccount']);
Route::post('register', [AuthController::class, 'createAccount']);

Route::group(['middleware' => 'checkToken'], function () {
    Route::post('marketer', [MarketersController::class, 'getByID']);
});
