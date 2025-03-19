<?php

use App\Http\Controllers\FrontendDashboardApi\FileController;
use Illuminate\Support\Facades\Route;

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

/**
 * Frontend application
 *
 * Boleh dibuat controller, atau callback controller langsung di sini
 * Letakkan controller di app\Http\Controllers\Frontend
 */

\Eventy::action('api.nextjs.routes.auth');
\Eventy::action('static.frontend.routes');

Route::get('/file/private/{path?}', [FileController::class, 'getPrivateFile'])
    ->where('path', '.*')
    ->name('private.file')
    ->middleware('auth:sanctum');
