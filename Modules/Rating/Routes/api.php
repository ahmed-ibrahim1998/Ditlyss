<?php

use Illuminate\Http\Request;
use Modules\Rating\Http\Controllers\RatingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/ratables', [\Modules\Rating\Http\Controllers\API\RatingsController::class, 'ratables']);
    \Illuminate\Support\Facades\Route::post('rate',[\Modules\Rating\Http\Controllers\API\RatingsController::class, 'rate']);
});
