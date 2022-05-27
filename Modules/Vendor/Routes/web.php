<?php



Route::prefix('/admin')->middleware('auth:web')->group(function () {

    Route::resource('vendor', 'VendorController');
    Route::resource('branch', 'BranchController');
    Route::resource('cuisine', 'CuisineController');
    Route::resource('category', 'CategoryController');

    Route::resource('consultation-package', 'ConsultationPackageController');

    Route::resource('consultation', 'ConsultationController');

});
