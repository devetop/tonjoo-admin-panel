<?php

namespace App\Providers;

use App\Models\AvailableSites;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('user_importable', \App\Services\UserImportable::class);
        $this->app->bind('user_export', \App\Exports\UserExport::class);
        $this->app->bind(\App\Services\DummyService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!app()->runningInConsole()) {
            config()->set('cors.allowed_origins', AvailableSites::where('is_cors_allowed', 1)->pluck('base_url')->push(url('/'))->toArray());
            AvailableSites::where('is_cors_allowed', 1)
                ->pluck('base_url')
                ->map(fn($item) => str_replace(array('http://', 'https://'), '', $item))
                ->map(fn($item) => config()->push('sanctum.stateful', $item));
        }

        ResetPassword::createUrlUsing(function ($notifiable, $token) {
            return url(route('cms.password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
        });

        Inertia::share('asset_url', asset('/'));
    }
}
