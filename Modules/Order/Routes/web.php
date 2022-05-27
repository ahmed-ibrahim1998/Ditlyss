<?php

Route::prefix('admin')->middleware(['auth:web'])->group(function() {
    Route::resource('order', Admin\OrderController::class);
    Route::resource('status', 'OrderStatusController');
    Route::get('cities/{country_id}', 'Admin\OrderController@getCountryCities')->name('order-country-cities.get');
    Route::get('areas/{city_id}', 'Admin\OrderController@getCityAreas')->name('order-city-areas.get');
});
