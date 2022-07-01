<?php

Route::group(['namespace' => 'Admin', 'prefix' => 'panel'], function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
});