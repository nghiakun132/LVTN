<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/statistic', [App\Http\Controllers\Api\StatisticController::class, 'index']);

Route::get('/check-order/{id}', [App\Http\Controllers\Api\OrderController::class, 'index']);

Route::get('/userAndOrder', [App\Http\Controllers\Api\StatisticController::class, 'userAndOrder']);

Route::get('/getProducts', [App\Http\Controllers\Api\ApiController::class, 'getProducts']);
