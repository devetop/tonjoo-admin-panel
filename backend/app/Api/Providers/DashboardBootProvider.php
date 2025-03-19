<?php

namespace App\Api\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DashboardBootProvider extends ServiceProvider
{
    public function boot()
    {
        config()->set('auth.guards.dashboard', [
            'driver' => 'session',
            'provider' => 'users',
        ]);

        \Eventy::addAction('backend.dashboard.routes', function () {
            Route::prefix('dashboard')
                ->name('dashboard.')
                ->middleware('auth:dashboard')
                ->namespace('\App\Http\Controllers\Backend\Dashboard')
                ->group(function () {
                    
                    Route::namespace('\App\Http\Controllers\Backend\Dashboard\Auth')
                        ->group(function () {
                            Route::get('/login', 'LoginController@showLoginForm')
                                ->name('login')
                                ->withoutMiddleware('auth:dashboard');
                            Route::post('/login', 'LoginController@login')
                                ->name('login-attempt')
                                ->withoutMiddleware('auth:dashboard');
                            Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')
                                ->name('password.request')
                                ->withoutMiddleware('auth:dashboard');
                            Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')
                                ->name('password.email')
                                ->withoutMiddleware('auth:dashboard');
                            Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')
                                ->name('password.reset')
                                ->withoutMiddleware('auth:dashboard');
                            Route::post('/password/reset', 'ResetPasswordController@reset')
                                ->name('password.update')
                                ->withoutMiddleware('auth:dashboard');
                                
                            Route::post('logout', 'LoginController@logout')->name('logout');

                            Route::get('/profile', 'ProfileController@edit')->name('profile');
                            Route::put('/profile', 'ProfileController@update')->name('profile.update');
                            Route::put('/profile/password', 'ProfileController@password')->name('profile.password');
                        });

                    Route::get('/', 'DashboardController@index')->name('index');
                });
        });

        register_authorization_context('dashboard', 'Dashboard');

        add_context_capability('dashboard', 'Dashboard', 'dashboard-index');
        add_context_capability('dashboard', 'User', 'user');
        add_context_capability('dashboard', 'Profile', 'profile', 'user');
    }
}