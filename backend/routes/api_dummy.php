<?php

use App\Http\Controllers\Dummy\CMS\MyProductController;
use App\Http\Controllers\Dummy\CMS\ProductController;


Route::prefix('api/dummy/')
    ->as('api.dummy.')
    ->middleware(['api', 'auth:sanctum,frontend-dashboard'])
    ->group(function() {
        Route::apiResource('product/mine', MyProductController::class)->names('product.mine');
        Route::apiResource('product', ProductController::class);
    });