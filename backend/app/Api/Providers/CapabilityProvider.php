<?php

namespace App\Api\Providers;

use App\Api\Supports\Strings;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class CapabilityProvider extends ServiceProvider implements DeferrableProvider
{
    protected $defer = true;

    public function provides()
    {
        return [
            \App\Api\Contracts\RoleCapabilityInterface::class,
            'role_capability',
            \App\Api\Contracts\ConfigRepository::class,
            \App\Api\Services\UserCapabilityInterface::class,
            'user_capability',
            \App\Api\Contracts\CapabilityCacheInterface::class,
            'capability_cache',
            \App\Api\Contracts\UserAuthorizationInterface::class,
            'user_authorization_api',
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
            \App\Api\Contracts\ConfigRepository::class,
            \App\Api\Repositories\LaravelConfig::class
        );

        $this->app->bind(
            'capability_cache',
            \App\Api\Contracts\CapabilityCacheInterface::class
        );

        $this->app->bind(
            \App\Api\Contracts\CapabilityCacheInterface::class,
            \App\Api\Services\LaravelCapabilityCache::class
        );

        $this->app->bind(
            \App\Api\Contracts\RoleCapabilityInterface::class,
            \App\Api\Services\RoleCapabilityService::class
        );

        $this->app->bind(
            'role_capability',
            \App\Api\Contracts\RoleCapabilityInterface::class
        );

        $this->app->singleton(
            \App\Api\Contracts\UserCapabilityInterface::class,
            function ($app) {
                return new \App\Api\Services\UserCapabilityService(
                    $app['auth']->user(),
                    $app['role_capability'],
                    $app['capability_cache'],
                    new Strings
                );
            }
        );

        $this->app->bind(
            'user_capability',
            \App\Api\Contracts\UserCapabilityInterface::class
        );

        $this->app->bind(
            \App\Api\Contracts\UserAuthorizationInterface::class,
            \App\Api\Services\UserAuthorizationService::class
        );

        $this->app->bind(
            'user_authorization_api',
            \App\Api\Contracts\UserAuthorizationInterface::class
        );
    }
}
