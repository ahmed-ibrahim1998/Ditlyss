<?php

Route::middleware('auth:web')->group(function () {
    Route::resource('coupons', 'CouponController');
});
