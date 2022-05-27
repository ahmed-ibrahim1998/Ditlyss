<?php

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

Route::prefix('/admin/')->middleware('auth:web')->group(function () {
    Route::get('settings', [\Modules\Settings\Http\Controllers\SettingsController::class, 'index'])->name('settings.index');
    Route::post('settings', [\Modules\Settings\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');
});
