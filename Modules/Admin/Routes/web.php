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

use Modules\Admin\Http\Controllers\LanguageController;

Route::get('/set-language/{language}', [LanguageController::class, 'setLang'])->name('switch-language');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    /**
     * Roles & Permissions Routes
     */
    Route::resource('roles-and-permissions', 'RolesAndPermissionsController');
    Route::get('{roleName}/permissions', 'RolesAndPermissionsController@showPermissions')->name('show-permissions-page');
    Route::post('{roleName}/permissions', 'RolesAndPermissionsController@savePermissions')->name('role-permissions.save');
    /**
     * ==============
     */


    /**
     * Users Routes
     */
    Route::resource('users', 'UsersController');
    Route::post('user-filteration', 'UsersController@userFilteration')->name('users.filter');

    
});


