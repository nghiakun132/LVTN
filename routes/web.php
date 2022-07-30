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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['namespace' => 'Client'], function () {
    Route::get('/', [App\Http\Controllers\Client\HomeController::class, 'index'])->name('client.home');
    Route::post('/login', [App\Http\Controllers\Client\AuthController::class, 'login'])->name('client.login');
    Route::post('/register', [App\Http\Controllers\Client\AuthController::class, 'register'])->name('client.register');
    Route::get('/logout', [App\Http\Controllers\Client\AuthController::class, 'logout'])->name('client.logout');
});

include 'admin.php';