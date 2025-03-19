<?php

namespace App\Api\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class CMSProvider extends ServiceProvider implements DeferrableProvider
{
    protected $defer = true;

    public function provides()
    {
        return [
            \App\Api\Contracts\PostInterface::class,
            'post_api',
            \App\Api\Contracts\PageInterface::class,
            'page_api',
            \App\Api\Contracts\RoutingInterface::class,
            'routing_api',
            \App\Api\Contracts\PageTemplatesInterface::class,
            'page_templates_api',
            \App\Api\Contracts\TermInterface::class,
            'term_api',
            // \App\Api\Contracts\CatchAllInterface::class,
            \App\Api\Contracts\CMSInterface::class,
            'cms_service',
        ];
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Api\Contracts\PostInterface::class,
            \App\Api\Services\PostEloquent::class,
        );

        $this->app->bind(
            'post_api',
            \App\Api\Contracts\PostInterface::class
        );

        $this->app->bind(
            \App\Api\Contracts\PageInterface::class,
            \App\Api\Services\PageEloquent::class,
        );

        $this->app->bind(
            'page_api',
            \App\Api\Contracts\PageInterface::class
        );

        // $this->app->bind(
        //     \App\Api\Contracts\CatchAllInterface::class,
        //     \App\Api\Services\CatchAllHandler::class,
        // );

        $this->app->bind(
            \App\Api\Contracts\RoutingInterface::class,
            \App\Api\Services\RoutingService::class,
        );

        $this->app->bind(
            'routing_api',
            \App\Api\Contracts\RoutingInterface::class
        );

        $this->app->bind(
            \App\Api\Contracts\PageTemplatesInterface::class,
            \App\Api\Services\PageTemplatesService::class,
        );

        $this->app->bind(
            'page_templates_api',
            \App\Api\Contracts\PageTemplatesInterface::class
        );

        $this->app->bind(
            \App\Api\Contracts\TermInterface::class,
            \App\Api\Services\TermEloquent::class,
        );

        $this->app->bind(
            'term_api',
            \App\Api\Contracts\TermInterface::class
        );

        $this->app->singleton(
            \App\Api\Contracts\CMSInterface::class,
            function ($app) {
                return new \App\Api\Services\CMSService($app);
            }
        );

        $this->app->bind(
            'cms_service',
            \App\Api\Contracts\CMSInterface::class
        );
    }
}
