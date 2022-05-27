<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->group(function () {

    Route::apiResource('address', 'API\AddressController');
    Route::apiResource('client', 'API\ClientController');

    Route::get('Authuser', [\Modules\Client\Http\Controllers\API\ClientController::class, 'getAuthUser']);

});
