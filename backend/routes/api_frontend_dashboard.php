<?php

use App\Http\Controllers\FrontendDashboardApi\AuthController;
use App\Http\Controllers\FrontendDashboardApi\CMS\ProductController;
use App\Http\Controllers\FrontendDashboardApi\CMS\ProductMineController;
use App\Http\Controllers\FrontendDashboardApi\CMS\ProductTagController;
use App\Http\Controllers\FrontendDashboardApi\CMS\ProductCategoryController;
use App\Http\Controllers\FrontendDashboardApi\FileController;
use App\Http\Controllers\FrontendDashboardApi\OptionsController;
use App\Http\Controllers\FrontendDashboardApi\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'api.'
], function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('reset-password');

    Route::get('/options/{option_name}', [OptionsController::class, 'show'])->whereIn('option_name', ['terms-of-service', 'privacy-policy'])->name('options');
});

Route::group([
    'middleware' => 'auth:sanctum,frontend-dashboard',
    'as' => 'api.'
], function () {
    // user profile
    Route::put('user/information', [AuthController::class, 'updateInformation'])->name('user.update.information');
    Route::put('user/password', [AuthController::class, 'updatePassword'])->name('user.update.password');

    Route::apiResource('product/mine', ProductMineController::class)->names('product.mine');

    Route::get('product/category/select', [ProductCategoryController::class, 'select'])->name('product.category.select');
    Route::get('product/tag/select', [ProductTagController::class, 'select'])->name('product.tag.select');
    Route::get('product/author/select', [ProductController::class, 'selectAuthor'])->name('product.tag.select');
    Route::apiResource('product/category', ProductCategoryController::class)->names('product.category');
    Route::apiResource('product/tag', ProductTagController::class)->names('product.category');
    Route::post('product/slug-validation', [ProductController::class, 'slugValidation'])->name('product.slug-validation');
    Route::apiResource('product', ProductController::class)->names('product');

    // upload file handler
    Route::post('/file/private/{path}', [FileController::class, 'privateUpload'])->where('path', '.*')->name('file.upload.private');
    Route::post('/file/{path}', [FileController::class, 'upload'])->where('path', '.*')->name('file.upload');
});
