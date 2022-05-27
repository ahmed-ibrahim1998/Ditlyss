<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use Modules\Cart\Http\Controllers\API\CartController;

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
    Route::apiResource('cart',\Modules\Cart\Http\Controllers\API\CartController::class);
});
