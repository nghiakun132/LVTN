<?php

Route::group(['namespace' => 'Admin', 'prefix' => 'panel'], function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home')->middleware('admin');
    Route::get('/login', [App\Http\Controllers\Admin\HomeController::class, 'login'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Admin\HomeController::class, 'loginPost']);
    Route::get('/logout', [App\Http\Controllers\Admin\HomeController::class, 'logout'])->name('admin.logout');

    Route::group(['prefix' => 'staff'], function () {
        Route::get('/', [App\Http\Controllers\Admin\StaffController::class, 'index'])->name('admin.staff.index');
    });
});