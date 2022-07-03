<?php

Route::group(['namespace' => 'Admin', 'prefix' => 'panel'], function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home')->middleware('admin');
    Route::get('/login', [App\Http\Controllers\Admin\HomeController::class, 'login'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Admin\HomeController::class, 'loginPost']);
    Route::get('/logout', [App\Http\Controllers\Admin\HomeController::class, 'logout'])->name('admin.logout');

    Route::group(['prefix' => 'staff', 'middleware' => ['admin', 'role']], function () {
        Route::get('/', [App\Http\Controllers\Admin\StaffController::class, 'index'])->name('admin.staff.index');
        Route::post('/', [App\Http\Controllers\Admin\StaffController::class, 'store']);
        Route::get('/{id}/edit', [App\Http\Controllers\Admin\StaffController::class, 'edit'])->name('admin.staff.edit');
        Route::post('/{id}/edit', [App\Http\Controllers\Admin\StaffController::class, 'update']);
        Route::get('/{id}/delete', [App\Http\Controllers\Admin\StaffController::class, 'delete'])->name('admin.staff.delete');
    });
});