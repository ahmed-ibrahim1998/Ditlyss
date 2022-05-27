<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\API\ProductController;


Route::middleware('auth:sanctum')->group(function () {

    // Product categories
    Route::get('product-categories', [\Modules\Product\Http\Controllers\API\ProductCategoryController::class, 'index']);

    // Products
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{product}', [ProductController::class, 'show']);
    Route::get('get-cat-products/{productCategory}', [ProductController::class, 'getCategoryProducts']);
    Route::get('get-vendor-products/{vendor}', [ProductController::class, 'getVendorProducts']);

});
