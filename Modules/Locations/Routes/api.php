<?php


Route::get('areas', [\Modules\Locations\Http\Controllers\Api\LocationsController::class, 'areas']);
Route::get('cities', [\Modules\Locations\Http\Controllers\Api\LocationsController::class, 'cities']);
Route::get('countries', [\Modules\Locations\Http\Controllers\Api\LocationsController::class, 'countries']);

Route::get('get-city-areas/{city}', [\Modules\Locations\Http\Controllers\Api\LocationsController::class, 'getCityAreas']);
Route::get('get-country-cities/{country}', [\Modules\Locations\Http\Controllers\Api\LocationsController::class, 'getCountryCities']);
