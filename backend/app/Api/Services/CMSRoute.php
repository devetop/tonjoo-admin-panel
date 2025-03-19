<?php

namespace App\Api\Services;

use Illuminate\Support\Facades\Route;

class CMSRoute
{
    public static function backend()
    {
        // Post
        Route::prefix('post')
            ->name('post')
            ->middleware('auth:admin')
            ->namespace('\App\Http\Controllers\Backend\CMS')
            ->group(function () {
                Route::name('.')->group(function () {
                    Route::resource('category', 'PostCategoryController');
                    Route::resource('tag', 'PostTagController');
                });
                
                Route::middleware('optimizeImages')->group(function () {
                    Route::get('/', 'PostController@index')->name('');
                    Route::get('/create', 'PostController@create')->name('.create');
                    Route::post('/store', 'PostController@store')->name('.store');
                    Route::get('/{id}/edit', 'PostController@edit')->name('.edit');
                    Route::post('/{id}/update', 'PostController@update')->name('.update');
                    Route::delete('/{id}/delete', 'PostController@destroy')->name('.delete');
                });
                
                Route::post('/slug-validation', 'PostController@slugValidation')->name('.slug-validation');
            });

        // Page
        Route::prefix('page')
            ->name('page')
            ->middleware('auth:admin')
            ->namespace('\App\Http\Controllers\Backend\CMS')
            ->group(function () {
                Route::middleware('optimizeImages')->group(function () {
                    Route::get('/', 'PageController@index')->name('');
                    Route::get('/create', 'PageController@create')->name('.create');
                    Route::post('/store', 'PageController@store')->name('.store');
                    Route::get('/{id}/edit', 'PageController@edit')->name('.edit');
                    Route::post('/{id}/update', 'PageController@update')->name('.update');
                    Route::delete('/{id}/delete', 'PageController@destroy')->name('.delete');
                });
            });

        // Product
        Route::prefix('product')
            ->name('product')
            ->middleware('auth:admin')
            ->namespace('\App\Http\Controllers\Backend\CMS')
            ->group(function () {
                Route::name('.')->group(function () {
                    Route::resource('category', 'ProductCategoryController');
                    Route::resource('tag', 'ProductTagController');
                });
                
                Route::middleware('optimizeImages')->group(function () {
                    Route::get('/', 'ProductController@index')->name('');
                    Route::get('/create', 'ProductController@create')->name('.create');
                    Route::post('/store', 'ProductController@store')->name('.store');
                    Route::get('/{id}/edit', 'ProductController@edit')->name('.edit');
                    Route::post('/{id}/update', 'ProductController@update')->name('.update');
                    Route::delete('/{id}/delete', 'ProductController@destroy')->name('.delete');
                });
            });

        // Media
        Route::name('media')
            ->prefix('media')
            ->middleware('auth:admin')
            ->group(function () {
                Route::middleware('optimizeImages')->group(function () {
                    Route::get('/', 'MediaController@index')->name('');
                    Route::get('/create', 'MediaController@create')->name('.create');
                    Route::post('/store', 'MediaController@store')->name('.store');
                    Route::get('/{id}/edit', 'MediaController@edit')->name('.edit');
                    Route::post('/{id}/update', 'MediaController@update')->name('.update');
                    Route::delete('/{id}/delete', 'MediaController@destroy')->name('.delete');
                });

            });

        // Option
        Route::prefix('option')
            ->name('option.')
            ->middleware('auth:admin')
            ->group(function () {
                Route::middleware('optimizeImages')->group(function () {
                    Route::get('/menu', 'MenuController@edit')->name('menu');
                    Route::post('/menu', 'MenuController@store')->name('menu.store');

                    Route::get('/banner', 'BannerController@edit')->name('banner');
                    Route::post('/banner', 'BannerController@store')->name('banner.store');

                    Route::get('/frontend-web-theme-options', 'OptionController@edit_frontend_web_theme_options')->name('frontend-web-theme-options.edit');

                    Route::get('/available-sites/generate-token', 'AvailableSitesController@generateToken')->name('available-sites.generate-token');
                    Route::get('/available-sites/delete-token', 'AvailableSitesController@deleteToken')->name('available-sites.delete-token');
                    Route::resource('available-sites', 'AvailableSitesController')->names('available-sites');
                });
            });
    }

    public static function frontend()
    {
        $postTypes = config('cms.frontend.routing.post-types', []);

        /**
         * index page (default: list post).
         */
        Route::get('/', 'HomeController@index')->name('frontend.index');

        foreach ($postTypes as $postType) {
            /**
             * post archive list.
             */
            Route::get("archive/$postType", 'PostController@list')->name("frontend.post-type.$postType.archive");

            /**
             * single post.
             */
            Route::get("/$postType/{slug}", 'PostController@single')->name("frontend.post-type.$postType.single")
                                                                    ->middleware('redirect-catch-all');
        }

        Route::get('search', 'SearchController@index')->name('frontend.search');

        /**
         * catch all except: cms, admin.
         */
        Route::pattern('catch_all', '^(?!(cms|admin|dashboard).*$).*');
        Route::get('/{catch_all}', 'CatchAllController@index')->name('frontend.catch-all');
    }
}
