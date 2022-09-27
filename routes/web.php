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
include 'admin.php';

Route::group(['namespace' => 'Client'], function () {
    Route::get('', [App\Http\Controllers\Client\HomeController::class, 'index'])->name('client.home');
    Route::post('dang-nhap', [App\Http\Controllers\Client\AuthController::class, 'login'])->name('client.login');
    Route::get('dang-nhap', [App\Http\Controllers\Client\AuthController::class, 'loginUser'])->name('client.loginUser');
    Route::post('dang-ky', [App\Http\Controllers\Client\AuthController::class, 'register'])->name('client.register');
    Route::get('dang-xuat', [App\Http\Controllers\Client\AuthController::class, 'logout'])->name('client.logout');

    Route::get('dang-nhap/google/', [App\Http\Controllers\Client\AuthController::class, 'redirectToGoogle'])->name('client.login.google');
    Route::get('dang-nhap/google/callback/', [App\Http\Controllers\Client\AuthController::class, 'googleCallback'])->name('client.login.google.callback');
    Route::get('xac-thuc-tai-khoan', [App\Http\Controllers\Client\AuthController::class, 'verifyAccount'])->name('client.verify.account');
    Route::post('xac-thuc-tai-khoan', [App\Http\Controllers\Client\AuthController::class, 'verifyAccountPost'])->name('client.verify.account.token');
    Route::get('dang-nhap/facebook', [App\Http\Controllers\Client\AuthController::class, 'redirectToFacebook'])->name('client.login.facebook');


    Route::get('/search', [App\Http\Controllers\Client\HomeController::class, 'search'])->name('client.search');
    Route::get('/searchAjax', [App\Http\Controllers\Client\HomeController::class, 'searchAjax'])->name('client.searchAjax');


    Route::group(['prefix' => 'tai-khoan', 'middleware' => ['user']],   function () {
        Route::get('', [App\Http\Controllers\Client\UserController::class, 'index'])->name('client.user.index');
        Route::post('thay-doi-thong-tin', [App\Http\Controllers\Client\UserController::class, 'changeInformation'])->name('client.user.change_information');
        Route::post('doi-mat-khau', [App\Http\Controllers\Client\UserController::class, 'changePassword'])->name('client.user.change_password');
        Route::get('don-hang-cua-toi', [App\Http\Controllers\Client\OrderController::class, 'index'])->name('client.order');
        Route::get('so-dia-chi', [App\Http\Controllers\Client\UserController::class, 'address'])->name('client.address');
        Route::get('so-dia-chi/them', [App\Http\Controllers\Client\UserController::class, 'addAddress'])->name('client.address.create');
        Route::post('so-dia-chi/them', [App\Http\Controllers\Client\UserController::class, 'addAddressPost'])->name('client.address.store');
        Route::get('so-dia-chi/{id}/sua', [App\Http\Controllers\Client\UserController::class, 'editAddress'])->name('client.address.edit');
        Route::post('so-dia-chi/{id}/sua', [App\Http\Controllers\Client\UserController::class, 'updateAddress'])->name('client.address.update');
        Route::get('dat-mat-dinh/{id}', [App\Http\Controllers\Client\UserController::class, 'setDefault'])->name('client.address.set_default');
        Route::get('so-dia-chi/{id}/xoa', [App\Http\Controllers\Client\UserController::class, 'deleteAddress'])->name('client.address.delete');
    });

    Route::get('/san-pham-da-xem', [App\Http\Controllers\Client\ProductController::class, 'watched'])->name('client.product.watched');
    //category

    Route::group([], function () {
        Route::get('{slug}', [App\Http\Controllers\Client\CategoryController::class, 'index'])->name('client.category');
        Route::get('/{slug}/{brand}', [App\Http\Controllers\Client\CategoryController::class, 'brand'])->name('client.brand');
        Route::get('/{slug}/{brand}/group/{group}', [App\Http\Controllers\Client\CategoryController::class, 'group'])->name('client.group');
        Route::get('/{slug}/{brand}/{product}', [App\Http\Controllers\Client\ProductController::class, 'index'])->name('client.product');
        Route::post('/{slug}/{brand}/{product}/comment', [App\Http\Controllers\Client\ProductController::class, 'comment'])->name('client.product.comment');
    });
});