<?php
Route::group(['namespace' => 'Admin', 'prefix' => 'panel'], function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home')->middleware('admin');
    Route::get('/login', [App\Http\Controllers\Admin\HomeController::class, 'login'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Admin\HomeController::class, 'loginPost']);
    Route::get('/logout', [App\Http\Controllers\Admin\HomeController::class, 'logout'])->name('admin.logout');

    Route::group(['prefix' => 'staff', 'middleware' => ['admin', 'role']], function () {
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
    });
});