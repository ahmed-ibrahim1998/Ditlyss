<?php

use Modules\Order\Http\Controllers\Client\API\OrderController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('order', OrderController::class);
});
