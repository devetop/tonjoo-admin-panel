<?php

use App\Http\Controllers\Backend\OAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

\Eventy::action('backend.admin.routes', $router);
\Eventy::action('backend.dashboard.routes', $router);

Route::get('oauth/login', [OAuthController::class, 'redirectTo'])->name('oauth.login');
Route::get('oauth/google', [OAuthController::class, 'handleGoogleCallback'])->name('oauth.callback.google');
Route::get('oauth/facebook', [OAuthController::class, 'handleFacebookCallback'])->name('oauth.callback.facebook');