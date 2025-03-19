<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DummyApiPovider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Services\DummyService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(base_path('routes/api_dummy.php'));
    }
}
