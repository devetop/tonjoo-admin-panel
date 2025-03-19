<?php

namespace App\Api\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HelperProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path().'/Api/Helpers/*_helper.php') as $filename) {
            require_once $filename;
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('may', function ($capabilities, $context = 'master') {
            return has_context_capability($context, $capabilities);
        });

        View::composer(
            'backend.layouts.navbars.menu.menu',
            \App\Api\Contracts\SideMenuInterface::class
        );
    }
}
