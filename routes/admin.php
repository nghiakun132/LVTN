<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImportController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\UserController;

const EDIT = '/{id}/edit';
const DELETE = '/{id}/delete';
const CHANGE_STATUS = '/{id}/change-status';

Route::group(['namespace' => 'Admin', 'prefix' => 'panel'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.home')->middleware('admin');
    Route::get('/login', [HomeController::class, 'login'])->name('admin.login');
    Route::post('/login', [HomeController::class, 'loginPost']);
    Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['admin']], function () {

        Route::group(['prefix' => 'staff', 'middleware' => ['role']], function () {
            Route::get('/', [StaffController::class, 'index'])->name('admin.staff.index');
            Route::post('/', [StaffController::class, 'store']);
            Route::get(EDIT, [StaffController::class, 'show'])->name('admin.staff.show');
            Route::post(EDIT, [StaffController::class, 'update'])->name('admin.staff.update');
            Route::get(DELETE, [StaffController::class, 'delete'])->name('admin.staff.delete');
            Route::get(CHANGE_STATUS, [StaffController::class, 'changeStatus'])
                ->name('admin.staff.changeStatus');
        });

        Route::group(['prefix' => 'category'], function () {
            Route::get('', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::post('', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::get(EDIT, [CategoryController::class, 'show'])->name('admin.category.show');
            Route::post(EDIT, [CategoryController::class, 'update'])->name('admin.category.update');
            Route::get(DELETE, [CategoryController::class, 'delete'])->name('admin.category.delete');
            Route::get(CHANGE_STATUS, [CategoryController::class, 'changeStatus'])
                ->name('admin.category.changeStatus');
        });

        Route::group(['prefix' => 'brand'], function () {
            Route::get('', [BrandController::class, 'index'])->name('admin.brand.index');
            Route::post('', [BrandController::class, 'store'])->name('admin.brand.store');
            Route::get(EDIT, [BrandController::class, 'show'])->name('admin.brand.show');
            Route::post(EDIT, [BrandController::class, 'update'])->name('admin.brand.update');
            Route::get(DELETE, [BrandController::class, 'delete'])->name('admin.brand.delete');
            Route::get(CHANGE_STATUS, [BrandController::class, 'changeStatus'])
                ->name('admin.brand.changeStatus');
            Route::get('/get-brand-by-category', [BrandController::class, 'getBrand'])->name('admin.brand.getBrand');
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('', [ProductController::class, 'index'])->name('admin.product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
            Route::post('/create', [ProductController::class, 'store'])->name('admin.product.store');
            Route::get(EDIT, [ProductController::class, 'show'])->name('admin.product.show');
            Route::post(EDIT, [ProductController::class, 'update'])->name('admin.product.update');
            Route::get('/delete', [ProductController::class, 'delete'])->name('admin.product.delete');
            Route::get(CHANGE_STATUS, [ProductController::class, 'changeStatus'])
                ->name('admin.product.changeStatus');
            Route::get('/{id}/detail', [ProductController::class, 'detail'])->name('admin.product.detail');
            Route::post('/{id}/images', [ProductController::class, 'uploadImages'])->name('admin.product.image');
            Route::post('/import', [ProductController::class, 'import'])->name('admin.product.import');
            Route::get('/export', [ProductController::class, 'export'])->name('admin.product.export');
            Route::post('/add-group-product', [ProductController::class, 'addGroup'])->name('admin.product.addGroup');
            Route::get('/get-group-product', [ProductController::class, 'getGroup'])->name('admin.product.getGroup');
            Route::post('/add-color-product', [ProductController::class, 'addColor'])->name('admin.product.addColor');
            Route::get('/get-color-product', [ProductController::class, 'getColor'])->name('admin.product.getColor');
            Route::get('/{id}/add-sales', [ProductController::class, 'addSales'])->name('admin.product.addSales');
            Route::post('/{id}/add-sales', [ProductController::class, 'addSalesPost'])
                ->name('admin.product.addSalesPost');
            Route::get('/{id}/delete-sales', [ProductController::class, 'deleteSales'])
                ->name('admin.product.deleteSale');
            Route::post('/{id}/add-image', [ProductController::class, 'addImg'])->name('admin.product.add-image');
        });

        Route::group(['prefix' => 'coupon'], function () {
            Route::get('', [CouponController::class, 'index'])->name('admin.coupon.index');
            Route::post('', [CouponController::class, 'store'])->name('admin.coupon.store');
            Route::get(EDIT, [CouponController::class, 'show'])->name('admin.coupon.show');
            Route::post(EDIT, [CouponController::class, 'update'])->name('admin.coupon.update');
            Route::get(DELETE, [CouponController::class, 'delete'])->name('admin.coupon.delete');
        });

        Route::group(['prefix' => 'import'], function () {
            Route::get('', [ImportController::class, 'index'])->name('admin.import.index');
            Route::get('export', [ImportController::class, 'export'])->name('admin.import.export');
            Route::get('detail/{id}', [ImportController::class, 'detail'])->name('admin.import.detail');
            Route::get('changeStatus/{id}', [ImportController::class, 'changeStatus'])
                ->name('admin.import.changestatus');
        });

        Route::group(['prefix' => 'sale'], function () {
            Route::get('', [SaleController::class, 'index'])->name('admin.sale.index');
            Route::post('', [SaleController::class, 'store'])->name('admin.sale.store');
            Route::get(DELETE, [SaleController::class, 'delete'])->name('admin.sale.delete');
            Route::get('changeStatus/{id}', [SaleController::class, 'changeStatus'])->name('admin.sale.changeStatus');
            Route::get('/add-product/{id}', [SaleController::class, 'addProduct'])->name('admin.sale.addProduct');
            Route::post('/add-product/{id}', [SaleController::class, 'addProductPost'])
                ->name('admin.sale.addProductPost');
            Route::get('/delete-product/{id}', [SaleController::class, 'deleteProduct'])
                ->name('admin.sale.delete.product');
        });

        Route::group(['prefix' => 'event'], function () {
            Route::get('', [EventController::class, 'index'])->name('admin.event.index');
            Route::post('', [EventController::class, 'store'])->name('admin.event.store');
            Route::get(EDIT, [EventController::class, 'show'])->name('admin.event.show');
            Route::post(EDIT, [EventController::class, 'update'])->name('admin.event.update');
            Route::get(DELETE, [EventController::class, 'delete'])->name('admin.event.delete');
            Route::get('/check', [EventController::class, 'check'])->name('admin.event.check');
            Route::get('/delete-detail', [EventController::class, 'deleteDetail'])
                ->name('admin.event.deleteDetail');
        });

        Route::group(['prefix' => 'comment'], function () {
            Route::get('', [CommentController::class, 'index'])->name('admin.comment.index');
            Route::get('/{id}/confirm', [CommentController::class, 'confirm'])->name('admin.comment.confirm');
            Route::get(DELETE, [CommentController::class, 'delete'])->name('admin.comment.delete');
            Route::post('/confirm-all', [CommentController::class, 'confirmAll'])->name('admin.comment.confirmAll');
            Route::post('/delete-all', [CommentController::class, 'deleteAll'])->name('admin.comment.deleteAll');
        });

        Route::group(['prefix' => 'order'], function () {
            Route::get('', [OrderController::class, 'index'])->name('admin.order.index');
            Route::get('/{id}/detail', [OrderController::class, 'detail'])->name('admin.order.detail');
            Route::get(DELETE, [OrderController::class, 'delete'])->name('admin.order.delete');
            Route::get(CHANGE_STATUS, [OrderController::class, 'changeStatus'])->name('admin.order.confirm');
            Route::get('/{id}/cancel', [OrderController::class, 'Cancel'])->name('admin.order.cancel');
            Route::get('/{id}/print', [OrderController::class, 'print'])->name('admin.order.print');
        });

        Route::group(['prefix' => 'delivery'], function () {
            Route::get('', [DeliveryController::class, 'index'])->name('admin.delivery.index');
            Route::post('', [DeliveryController::class, 'store'])->name('admin.delivery.store');
            Route::get(EDIT, [DeliveryController::class, 'edit'])->name('admin.delivery.edit');
            Route::post(EDIT, [DeliveryController::class, 'update'])->name('admin.delivery.update');
            Route::get(DELETE, [DeliveryController::class, 'destroy'])->name('admin.delivery.delete');
            Route::get(CHANGE_STATUS, [DeliveryController::class, 'changeStatus'])
                ->name('admin.delivery.confirm');
        });

        Route::group(['prefix' => 'user'], function () {
            Route::get('', [UserController::class, 'index'])->name('admin.user.index');
            Route::post('/active', [UserController::class, 'active'])->name('admin.user.active');
            Route::get(DELETE, [UserController::class, 'destroy'])->name('admin.user.delete');
            Route::get(CHANGE_STATUS, [UserController::class, 'changeStatus'])->name('admin.user.confirm');
        });
    });
});
