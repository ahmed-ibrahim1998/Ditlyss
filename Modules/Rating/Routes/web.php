<?php


Route::prefix('/admin/')->group(function () {
    Route::resource('ratings', 'RatingController');
});
