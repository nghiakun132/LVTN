<?php


Route::group(['namespace' => 'Admin', 'prefix' => 'panel'], function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home')->middleware('admin');
    Route::get('/login', [App\Http\Controllers\Admin\HomeController::class, 'login'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Admin\HomeController::class, 'loginPost']);
    Route::get('/logout', [App\Http\Controllers\Admin\HomeController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['admin']], function () {

        Route::group(['prefix' => 'staff', 'middleware' => ['role']], function () {
            Route::get('/', [App\Http\Controllers\Admin\StaffController::class, 'index'])->name('admin.staff.index');
            Route::post('/', [App\Http\Controllers\Admin\StaffController::class, 'store']);
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\StaffController::class, 'show'])->name('admin.staff.show');
            Route::post('/{id}/edit', [App\Http\Controllers\Admin\StaffController::class, 'update'])->name('admin.staff.update');
            Route::get('/{id}/delete', [App\Http\Controllers\Admin\StaffController::class, 'delete'])->name('admin.staff.delete');
            Route::get('/{id}/change-status', [App\Http\Controllers\Admin\StaffController::class, 'changeStatus'])->name('admin.staff.changeStatus');
        });

        Route::group(['prefix' => 'category'], function () {
            Route::get('', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
            Route::post('', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin.category.show');
            Route::post('/{id}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
            Route::get('/{id}/delete', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.category.delete');
            Route::get('/{id}/change-status', [App\Http\Controllers\Admin\CategoryController::class, 'changeStatus'])->name('admin.category.changeStatus');
        });

        Route::group(['prefix' => 'brand'], function () {
            Route::get('', [App\Http\Controllers\Admin\BrandController::class, 'index'])->name('admin.brand.index');
            Route::post('', [App\Http\Controllers\Admin\BrandController::class, 'store'])->name('admin.brand.store');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\BrandController::class, 'show'])->name('admin.brand.show');
            Route::post('/{id}/edit', [App\Http\Controllers\Admin\BrandController::class, 'update'])->name('admin.brand.update');
            Route::get('/{id}/delete', [App\Http\Controllers\Admin\BrandController::class, 'delete'])->name('admin.brand.delete');
            Route::get('/{id}/change-status', [App\Http\Controllers\Admin\BrandController::class, 'changeStatus'])->name('admin.brand.changeStatus');
            Route::get('/get-brand-by-category', [App\Http\Controllers\Admin\BrandController::class, 'getBrand'])->name('admin.brand.getBrand');
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product.index');
            Route::get('/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.product.create');
            Route::post('/create', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.product.store');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('admin.product.show');
            Route::post('/{id}/edit', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.product.update');
            Route::get('/delete', [App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('admin.product.delete');
            Route::get('/{id}/change-status', [App\Http\Controllers\Admin\ProductController::class, 'changeStatus'])->name('admin.product.changeStatus');
            Route::get('/{id}/detail', [App\Http\Controllers\Admin\ProductController::class, 'detail'])->name('admin.product.detail');
            // Route::post('/{id}/detail', [App\Http\Controllers\Admin\ProductController::class, 'detailPost'])->name('admin.product.detailPost');
            Route::post('/{id}/images', [App\Http\Controllers\Admin\ProductController::class, 'uploadImages'])->name('admin.product.image');
            Route::post('/import', [App\Http\Controllers\Admin\ProductController::class, 'import'])->name('admin.product.import');
            Route::get('/export', [App\Http\Controllers\Admin\ProductController::class, 'export'])->name('admin.product.export');
            Route::post('/add-group-product', [App\Http\Controllers\Admin\ProductController::class, 'addGroup'])->name('admin.product.addGroup');
            Route::get('/get-group-product', [App\Http\Controllers\Admin\ProductController::class, 'getGroup'])->name('admin.product.getGroup');
            Route::post('/add-color-product', [App\Http\Controllers\Admin\ProductController::class, 'addColor'])->name('admin.product.addColor');
            Route::get('/get-color-product', [App\Http\Controllers\Admin\ProductController::class, 'getColor'])->name('admin.product.getColor');
            Route::get('/{id}/add-sales', [App\Http\Controllers\Admin\ProductController::class, 'addSales'])->name('admin.product.addSales');
            Route::post('/{id}/add-sales', [App\Http\Controllers\Admin\ProductController::class, 'addSalesPost'])->name('admin.product.addSalesPost');
            Route::get('/{id}/delete-sales', [App\Http\Controllers\Admin\ProductController::class, 'deleteSales'])->name('admin.product.deleteSale');
            Route::post('/{id}/add-image', [App\Http\Controllers\Admin\ProductController::class, 'addImg'])->name('admin.product.add-image');
        });

        Route::group(['prefix' => 'coupon'], function () {
            Route::get('', [App\Http\Controllers\Admin\CouponController::class, 'index'])->name('admin.coupon.index');
            Route::post('', [App\Http\Controllers\Admin\CouponController::class, 'store'])->name('admin.coupon.store');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\CouponController::class, 'show'])->name('admin.coupon.show');
            Route::post('/{id}/edit', [App\Http\Controllers\Admin\CouponController::class, 'update'])->name('admin.coupon.update');
            Route::get('/{id}/delete', [App\Http\Controllers\Admin\CouponController::class, 'delete'])->name('admin.coupon.delete');
        });

        Route::group(['prefix' => 'import'], function () {
            Route::get('', [App\Http\Controllers\Admin\ImportController::class, 'index'])->name('admin.import.index');
            Route::get('export', [App\Http\Controllers\Admin\ImportController::class, 'export'])->name('admin.import.export');
            Route::get('detail/{id}', [App\Http\Controllers\Admin\ImportController::class, 'detail'])->name('admin.import.detail');
            Route::get('changeStatus/{id}', [App\Http\Controllers\Admin\ImportController::class, 'changeStatus'])->name('admin.import.changestatus');
        });

        Route::group(['prefix' => 'sale'], function () {
            Route::get('', [App\Http\Controllers\Admin\SaleController::class, 'index'])->name('admin.sale.index');
            Route::post('', [App\Http\Controllers\Admin\SaleController::class, 'store'])->name('admin.sale.store');
            Route::get('/{id}/delete', [App\Http\Controllers\Admin\SaleController::class, 'delete'])->name('admin.sale.delete');
            Route::get('changeStatus/{id}', [App\Http\Controllers\Admin\SaleController::class, 'changeStatus'])->name('admin.sale.changeStatus');
        });

        Route::group(['prefix' => 'event'], function () {
            Route::get('', [App\Http\Controllers\Admin\EventController::class, 'index'])->name('admin.event.index');
            Route::post('', [App\Http\Controllers\Admin\EventController::class, 'store'])->name('admin.event.store');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\EventController::class, 'show'])->name('admin.event.show');
            Route::post('/{id}/edit', [App\Http\Controllers\Admin\EventController::class, 'update'])->name('admin.event.update');
            Route::get('/{id}/delete', [App\Http\Controllers\Admin\EventController::class, 'delete'])->name('admin.event.delete');
            Route::get('/check', [App\Http\Controllers\Admin\EventController::class, 'check'])->name('admin.event.check');
            Route::get('/delete-detail', [App\Http\Controllers\Admin\EventController::class, 'deleteDetail'])->name('admin.event.deleteDetail');
        });

        Route::group(['prefix' => 'comment'], function () {
            Route::get('', [App\Http\Controllers\Admin\CommentController::class, 'index'])->name('admin.comment.index');
            Route::get('/{id}/confirm', [App\Http\Controllers\Admin\CommentController::class, 'confirm'])->name('admin.comment.confirm');
            Route::get('/{id}/delete', [App\Http\Controllers\Admin\CommentController::class, 'delete'])->name('admin.comment.delete');
            Route::post('/confirm-all', [App\Http\Controllers\Admin\CommentController::class, 'confirmAll'])->name('admin.comment.confirmAll');
            Route::post('/delete-all', [App\Http\Controllers\Admin\CommentController::class, 'deleteAll'])->name('admin.comment.deleteAll');
        });

        Route::group(['prefix' => 'order'], function () {
            Route::get('', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.order.index');
            Route::get('/{id}/detail', [App\Http\Controllers\Admin\OrderController::class, 'detail'])->name('admin.order.detail');
            Route::get('/{id}/delete', [App\Http\Controllers\Admin\OrderController::class, 'delete'])->name('admin.order.delete');
            Route::get('/{id}/change-status', [App\Http\Controllers\Admin\OrderController::class, 'changeStatus'])->name('admin.order.confirm');
            Route::get('/{id}/cancel', [App\Http\Controllers\Admin\OrderController::class, 'Cancel'])->name('admin.order.cancel');
            Route::get('/{id}/print', [App\Http\Controllers\Admin\OrderController::class, 'print'])->name('admin.order.print');
        });

        Route::group(['prefix' => 'delivery'], function () {
            Route::get('', [App\Http\Controllers\Admin\DeliveryController::class, 'index'])->name('admin.delivery.index');
            Route::post('', [App\Http\Controllers\Admin\DeliveryController::class, 'store'])->name('admin.delivery.store');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\DeliveryController::class, 'edit'])->name('admin.delivery.edit');
            Route::post('/{id}/edit', [App\Http\Controllers\Admin\DeliveryController::class, 'update'])->name('admin.delivery.update');
            Route::get('/{id}/delete', [App\Http\Controllers\Admin\DeliveryController::class, 'destroy'])->name('admin.delivery.delete');
            Route::get('/{id}/change-status', [App\Http\Controllers\Admin\DeliveryController::class, 'changeStatus'])->name('admin.delivery.confirm');
        });

        Route::group(['prefix' => 'user'], function () {
            Route::get('', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
            Route::post('/active', [App\Http\Controllers\Admin\UserController::class, 'active'])->name('admin.user.active');
            Route::get('/{id}/delete', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.user.delete');
            Route::get('/{id}/change-status', [App\Http\Controllers\Admin\UserController::class, 'changeStatus'])->name('admin.user.confirm');
        });
    });
});
