<?php

namespace App\Api\Providers;

use App\Api\Services\PostProductEloquent;
use App\Capabilities\EditProduct;
use App\Http\Controllers\FrontendDashboardApi\AuthController;
use App\Services\FileStorageService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class FrontendDashboardBootProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(PostProductEloquent::class);
        $this->app->singleton(FileStorageService::class);
    }

    public function boot()
    {

        \Eventy::addAction('api.nextjs.routes.auth', function() {
            Route::group([
                "namespace" => "\App\Http\Controllers\FrontendDashboardApi"
            ], function() {
                Route::post('/api/login', 'AuthenticatedSessionController@store')->name('api.login')->middleware('guest:frontend-dashboard');
                Route::post('/api/admin/login', 'AuthenticatedSessionController@adminStore')->name('api.admin.login')->middleware('guest:frontend-dashboard');
                
                Route::post('/api/logout', 'AuthenticatedSessionController@destroy')->name('api.logout')->middleware('auth:frontend-dashboard');
            });
        });

        \Eventy::addAction('api.nextjs.routes', function () {
            Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum')->name('api.user');
            Route::group([], base_path('routes/api_frontend_dashboard.php'));
        });

        add_context_capability('dashboard', 'Auth', 'auth');
        add_context_capability('dashboard', 'Login as Admin', 'login-as-admin', 'auth');
        add_context_capability('dashboard', 'Login as User', 'login-as-user', 'auth');

        add_context_capability('dashboard', 'Product', 'product');
        add_context_capability('dashboard', 'Create Product', 'product-can-create', 'product');
        add_context_capability('dashboard', 'List all Products', 'product-can-view-all', 'product');
        add_context_capability('dashboard', 'Show all Product', 'product-can-show-all', 'product');
        add_context_capability('dashboard', 'Update all Product', 'product-can-update-all', 'product');
        add_context_capability('dashboard', 'Delete all Products', 'product-can-delete-all', 'product');
        add_context_capability('dashboard', 'Create My Product', 'product-can-create-mine', 'product');
        add_context_capability('dashboard', 'List My Products', 'product-can-view-mine', 'product');
        add_context_capability('dashboard', 'Show My Product', 'product-can-show-mine', 'product', '\App\Capabilities\Product@mine');
        add_context_capability('dashboard', 'Update My Product', 'product-can-update-mine', 'product', '\App\Capabilities\Product@mine');
        add_context_capability('dashboard', 'Delete My Product', 'product-can-delete-mine', 'product', '\App\Capabilities\Product@mine');
    }
}