<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('', function () {
//     return view('welcome');
// });

Route::group(['namespace' => 'Client'], function () {
    Route::get('', [App\Http\Controllers\Client\HomeController::class, 'index'])->name('client.home');
    Route::post('dang-nhap', [App\Http\Controllers\Client\AuthController::class, 'login'])->name('client.login');
    Route::get('dang-nhap', [App\Http\Controllers\Client\AuthController::class, 'loginUser'])->name('client.loginUser');
    Route::post('dang-ky', [App\Http\Controllers\Client\AuthController::class, 'register'])->name('client.register');
    Route::get('dang-xuat', [App\Http\Controllers\Client\AuthController::class, 'logout'])->name('client.logout');
    Route::get('dang-nhap/google', [App\Http\Controllers\Client\AuthController::class, 'redirectToGoogle'])->name('client.login.google');
    Route::get('dang-nhap/google/callback', [App\Http\Controllers\Client\AuthController::class, 'googleCallback'])->name('client.login.google.callback');
    Route::get('xac-thuc-tai-khoan', [App\Http\Controllers\Client\AuthController::class, 'verifyAccount'])->name('client.verify.account');
    Route::post('xac-thuc-tai-khoan', [App\Http\Controllers\Client\AuthController::class, 'verifyAccountPost'])->name('client.verify.account.token');
    Route::get('dang-nhap/facebook', [App\Http\Controllers\Client\AuthController::class, 'redirectToFacebook'])->name('client.login.facebook');
    Route::group(['prefix' => 'tai-khoan', 'middleware' => ['user']],   function () {
        Route::get('', [App\Http\Controllers\Client\UserController::class, 'index'])->name('client.user.index');
        Route::post('thay-doi-thong-tin', [App\Http\Controllers\Client\UserController::class, 'changeInformation'])->name('client.user.change_information');
        Route::post('doi-mat-khau', [App\Http\Controllers\Client\UserController::class, 'changePassword'])->name('client.user.change_password');
    });
});

include 'admin.php';