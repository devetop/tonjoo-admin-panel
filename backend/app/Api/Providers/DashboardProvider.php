<?php

namespace App\Api\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class DashboardProvider extends ServiceProvider implements DeferrableProvider
{
    protected $defer = true;

    public function provides()
    {
        return [
            \App\Api\Contracts\CatchAllInterface::class,
        ];
    }

    public function register()
    {
        $this->app->bind(
            \App\Api\Contracts\CatchAllInterface::class,
            \App\Api\Services\CatchAllNextJsHandler::class,
        );
    }
}