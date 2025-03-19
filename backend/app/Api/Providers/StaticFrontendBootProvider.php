<?php

namespace App\Api\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class StaticFrontendBootProvider extends ServiceProvider
{
    public function boot()
    {
        \Eventy::addAction("static.frontend.routes", function () {
            Route::any('/jsx/api/{any?}', 'StaticController@api')->where('any', '.*')->name('static.jsx.api');
            Route::any('/jsx/{any?}', 'StaticController@jsx')->where('any', '.*')->name('static.jsx');
            Route::any('/html/api/{any?}', 'StaticController@api')->where('any', '.*')->name('static.html.api');
            Route::any('/html/{any?}', 'StaticController@html')->where('any', '.*')->name('static.html');
        });
    }
}