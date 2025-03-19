<?php

namespace App\Api\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class FrontendWebBootProvider extends ServiceProvider
{
    public function boot()
    {

        \Eventy::addAction('api.nextjs.routes', function () {

            Route::group([
                "namespace" => "App\Http\Controllers\FrontendWebApi",
                "as" => "api."
            ], function () {
                // public frontend-web
                Route::get('/archive/author/{name}','ArchiveController@author')->name('author');
                Route::get('/archive/{post_type}/{slug}', 'ArchiveController@single')->name('single');
                Route::get('/archive/{any}', 'ArchiveController@index')->name('archive');

                Route::get('/theme-options', 'WebThemeOptionsController')->name('theme-options');
                Route::get('/{catch_all}', 'CatchAllController@single')->name('catch-all');
            });

        });

    }
}