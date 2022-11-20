<?php

use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\CartController;
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


include 'admin.php';

Route::group(['namespace' => 'Client'], function () {
    Route::get('', [HomeController::class, 'index'])->name('client.home');
    Route::post('dang-nhap', [AuthController::class, 'login'])->name('client.login');
    Route::get('dang-nhap', [AuthController::class, 'loginUser'])->name('client.loginUser');
    Route::post('dang-ky', [AuthController::class, 'register'])->name('client.register');
    Route::get('dang-xuat', [AuthController::class, 'logout'])->name('client.logout');

    Route::get('dang-nhap/google/', [AuthController::class, 'redirectToGoogle'])->name('client.login.google');
    Route::get('dang-nhap/google/callback/', [AuthController::class, 'googleCallback'])
        ->name('client.login.google.callback');
    Route::get('xac-thuc-tai-khoan', [AuthController::class, 'verifyAccount'])->name('client.verify.account');
    Route::post('xac-thuc-tai-khoan', [AuthController::class, 'verifyAccountPost'])
        ->name('client.verify.account.token');
    Route::get('dang-nhap/facebook', [AuthController::class, 'redirectToFacebook'])->name('client.login.facebook');

    Route::get('forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');

    Route::get('/search', [HomeController::class, 'search'])->name('client.search');
    Route::get('/searchAjax', [HomeController::class, 'searchAjax'])->name('client.searchAjax');
    Route::group(['middleware' => ['user']], function () {
        Route::group(['prefix' => 'tai-khoan'],   function () {
            Route::get('', [UserController::class, 'index'])->name('client.user.index');
            Route::post('thay-doi-thong-tin', [UserController::class, 'changeInformation'])
                ->name('client.user.change_information');
            Route::post('doi-mat-khau', [UserController::class, 'changePassword'])->name('client.user.change_password');
            Route::group(['prefix' => 'so-dia-chi'], function () {
                Route::get('', [UserController::class, 'address'])->name('client.address');
                Route::get('/them', [UserController::class, 'addAddress'])->name('client.address.create');
                Route::post('/them', [UserController::class, 'addAddressPost'])->name('client.address.store');
                Route::get('/{id}/sua', [UserController::class, 'editAddress'])->name('client.address.edit');
                Route::post('/{id}/sua', [UserController::class, 'updateAddress'])->name('client.address.update');
                Route::get('dat-mat-dinh/{id}', [UserController::class, 'setDefault'])
                    ->name('client.address.set_default');
                Route::get('so-dia-chi/{id}/xoa', [UserController::class, 'deleteAddress'])
                    ->name('client.address.delete');
            });
            Route::group(['prefix' => 'don-hang-cua-toi'], function () {
                Route::get('', [OrderController::class, 'index'])->name('client.order');
                Route::get('chi-tiet/{id}', [OrderController::class, 'detail'])->name('client.order.detail');
                Route::get('huy-don-hang', [OrderController::class, 'cancel'])->name('client.order.cancel');
                Route::post('huy-don-hang', [OrderController::class, 'cancelPost'])->name('client.order.cancel.order');
            });

            Route::get('/thong-bao', [UserController::class, 'notification'])->name('client.user.notification');
            Route::post('/xoa-thong-bao', [UserController::class, 'deleteNotification'])
                ->name('client.user.delete_notification');
        });

        Route::group(['prefix' => 'gio-hang'], function () {
            Route::get('', [CartController::class, 'index'])->name('client.cart');
            Route::post('/them-gio-hang', [CartController::class, 'store'])->name('client.cart.add');
            Route::post('xoa/', [CartController::class, 'destroy'])->name('client.cart.delete');
            Route::post('xoa-tat-ca', [CartController::class, 'clear'])->name('client.cart.deleteAll');
            Route::post('cap-nhat', [CartController::class, 'update'])->name('client.cart.update');
            Route::post('cap-nhat-tat-ca', [CartController::class, 'updateAll'])->name('client.cart.updateAll');
        });


        Route::group(['middleware' => ['checkCart']], function () {
            Route::get('/thanh-toan', [CartController::class, 'checkout'])->name('client.cart.checkout');
            Route::post('/thanh-toan', [CartController::class, 'checkoutPost'])->name('client.cart.checkoutPost');
            Route::post('/ap-ma-giam-gia', [CartController::class, 'applyCoupon'])->name('client.cart.applyCoupon');
            Route::post('/huy-ma-giam-gia', [CartController::class, 'cancelCoupon'])->name('client.cart.cancelCoupon');
            Route::get('/huy-paypal', [CartController::class, 'cancelTransaction'])->name('cancelTransaction');
            Route::get('/hoan-thanh-paypal', [CartController::class, 'successTransaction'])->name('successTransaction');
            Route::get('thanh-toan-vnpay', [CartController::class, 'vnpay'])->name('vnpay');
        });
        Route::get('/hoan-thanh', [CartController::class, 'success'])->name('client.cart.success');
        Route::get('/danh-sach-san-pham-yeu-thich', [ProductController::class, 'wishlist'])->name('client.wishlist');
        Route::post('/them-san-pham-yeu-thich', [ProductController::class, 'addWishlist'])->name('client.wishlist.add');
        Route::post('/xoa-san-pham-yeu-thich', [ProductController::class, 'removeWishlist'])
            ->name('client.wishlist.delete');
    });
    Route::get('/san-pham-da-xem', [ProductController::class, 'watched'])->name('client.product.watched');
    //category




    Route::group([], function () {
        Route::get('{slug}', [CategoryController::class, 'index'])->name('client.category');
        Route::get('/{slug}/{brand}', [CategoryController::class, 'brand'])->name('client.brand');
        Route::get('/{slug}/{brand}/group/{group}', [CategoryController::class, 'group'])->name('client.group');
        Route::get('/{slug}/{brand}/{product}', [ProductController::class, 'index'])->name('client.product');
        Route::post('/{slug}/{brand}/{product}/comment', [ProductController::class, 'comment'])
            ->name('client.product.comment');
    });
});
