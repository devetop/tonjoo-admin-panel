<?php

namespace App\Api\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ObjectProvider extends ServiceProvider implements DeferrableProvider
{
    protected $defer = true;

    public function provides()
    {
        return [
            \App\Api\Contracts\OptionInterface::class,
            'option_api',
            \App\Api\Contracts\ImageStorageInterface::class,
            'image_store_api',
            \App\Api\Contracts\RouteInterface::class,
            'router_api',
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Api\Contracts\ImageStorageInterface::class,
            \App\Api\Services\ImageStorageService::class,
        );

        $this->app->bind(
            'image_store_api',
            \App\Api\Contracts\ImageStorageInterface::class
        );

        $this->app->singleton(
            \App\Api\Contracts\OptionInterface::class,
            \App\Api\Services\OptionEloquent::class,
        );

        $this->app->singleton(
            'option_api',
            \App\Api\Contracts\OptionInterface::class
        );

        $this->app->bind(
            \App\Api\Contracts\SideMenuInterface::class,
            \App\Api\Services\SideMenuService::class
        );

        $this->app->singleton(
            \App\Api\Contracts\RouteInterface::class,
            function ($app) {
                return new \App\Api\Services\RouteService($app['config']);
            }
        );

        $this->app->bind(
            'router_api',
            \App\Api\Contracts\RouteInterface::class,
        );
    }
}
