<?php

namespace App\Api\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AdminBootProvider extends ServiceProvider
{
    public function boot()
    {
        config()->set('auth.guards.admin', [
            'driver' => 'session',
            'provider' => 'users',
        ]);

        \Eventy::addAction('backend.admin.routes', function () {
            Route::prefix('')
                ->name('cms.')
                ->group(function () {
                    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
                    Route::post('login', 'Auth\LoginController@login');
                    Route::post('logout', 'Auth\LoginController@logout')->name('logout')->middleware('auth:admin');

                    // Password
                    Route::prefix('password')
                        ->name('password.')
                        ->middleware('guest')
                        ->group(function () {
                        Route::get('/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('request');
                        Route::post('/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('email');
                        Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('reset');
                        Route::post('/reset', 'Auth\ResetPasswordController@reset')->name('update');
                    });

                    // Dashboard
                    Route::get('', 'ShowDashboardPage')->name('dashboard');
                    // Profile
                    Route::name('profile.')
                        ->prefix('profile')
                        ->middleware('auth:admin')
                        ->group(function () {
                        Route::get('/', 'Auth\ProfileController@edit')->name('edit');
                        Route::put('/', 'Auth\ProfileController@update')->name('update');
                        Route::put('password', 'Auth\ProfileController@password')->name('password');
                    });
                    // Option
                    Route::prefix('option')
                        ->name('option')
                        ->middleware('auth:admin')
                        ->group(function () {
                        Route::middleware('optimizeImages')->group(function () {

                            Route::get('/general', 'OptionController@edit')->name('.general');
                            Route::post('/general', 'OptionController@store')->name('.general.store');

                        });
                    });
                    // User
                    Route::name('user')
                        ->prefix('user')
                        ->middleware('auth:admin')
                        ->group(function () {
                        Route::get('/', 'UserController@index')->name('');
                        Route::get('/create', 'UserController@create')->name('.create');
                        Route::post('/store', 'UserController@store')->name('.store');
                        Route::get('/{user}/edit', 'UserController@edit')->name('.edit');
                        Route::put('/{id}/update', 'UserController@update')->name('.update');
                        Route::delete('/{id}/delete', 'UserController@destroy')->name('.delete');
                        Route::put('/{id}/password', 'UserController@password')->name('.password');
                        Route::post('/create-role-user', 'UserController@createRoleUser')->name('.create-role-user');
                        Route::delete('/{user}/{role}/delete-role-user', 'UserController@destroyRoleUser')->name('.delete-role-user');
                        // Route::get('/import', 'UserController@import')->name('.import');
    
                        Route::get('/import', 'UserExportImportController@import')->name('.import');
                        Route::post('/import', 'UserExportImportController@importUpload')->name('.import.upload');
                        Route::get('/import/progress/', 'UserExportImportController@importProgress')->name('.import.progress');

                        Route::get('/export', 'UserExportImportController@exportPage')->name('.export.page');
                        Route::get('/export/batch', 'UserExportImportController@exportBatch')->name('.export.batch');
                        Route::get('/export/batch/progress', 'UserExportImportController@exportProgress')->name('.export.progress');
                        Route::get('/export/batch/{filename}/download', 'UserExportImportController@exportDownload')->name('.export.download');
                    });

                    // Role
                    Route::name('role')
                        ->prefix('role')
                        ->middleware('auth:admin')
                        ->group(function () {
                        Route::get('/', 'RoleController@index')->name('');
                        Route::get('/create', 'RoleController@create')->name('.create');
                        Route::post('/store', 'RoleController@store')->name('.store');
                        Route::get('/{id}/edit', 'RoleController@edit')->name('.edit');
                        Route::put('/{id}/update', 'RoleController@update')->name('.update');
                        Route::delete('/{id}/delete', 'RoleController@destroy')->name('.delete');

                    });

                    \Eventy::action('cms.backend');

                    Route::name('static-page')
                        ->middleware('auth:admin')
                        ->get('/static-page', function () {
                            return Inertia::render('Welcome');
                        });

                });

        });

        add_capability('Show Debugbar', 'debugbar');
    }
}