<?php

namespace App\Api\Providers;

use Illuminate\Support\ServiceProvider;

class CMSBootProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \CMS::enable();
    }
}
