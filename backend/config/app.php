<?php

use Illuminate\Support\Facades\Facade;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'frontend_dashboard_base_url' => env('FRONTEND_DASHBOARD_BASE_URL', 'http://localhost:8090'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'Asia/Jakarta',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'id',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'id_ID',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store'  => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */
        App\Api\Eventy\EventServiceProvider::class,

        /**
         * Backend API
         */
        App\Api\Providers\CapabilityProvider::class,
        App\Api\Providers\ObjectProvider::class,
        App\Api\Providers\ObjectBootProvider::class,
        App\Api\Providers\HelperProvider::class,

        /**
         * API Core Plugin
         */
        App\Api\Tools\Providers\AppServiceProvider::class,

        /**
         * CMS API
         */
        App\Api\Providers\CMSProvider::class,
        App\Api\Providers\CMSBootProvider::class,

        /**
         * Admin Route
         */
        App\Api\Providers\AdminBootProvider::class,

        /**
         * Dashboard Route
         */
        App\Api\Providers\DashboardProvider::class,
        App\Api\Providers\DashboardBootProvider::class,

        /**
         * Frontend Dashboard API
         */
        App\Api\Providers\FrontendDashboardBootProvider::class,

        /**
         * Frontend Web API
         * karena terdapat Route::get('/{catch_all} jadi pemanggilan harus dibawah frontend-dashboard.
         */
        App\Api\Providers\FrontendWebBootProvider::class,

        /**
         * Frontend Static Route
         */
        App\Api\Providers\StaticFrontendBootProvider::class,

        /*
        * Application Service Providers...
        */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

        App\Providers\DummyApiPovider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        'Eventy' => App\Api\Eventy\Facades\Events::class,
        'ApiRoute' => App\Api\Facades\ApiRouteFacade::class,
        'CMS' => \App\Api\Facades\CMSFacade::class,
        'Post' => App\Api\Facades\PostFacade::class,
        'Page' => App\Api\Facades\PageFacade::class,
        'Option' => App\Api\Facades\OptionFacade::class,
        'Routing' => App\Api\Facades\RoutingFacade::class,
        'ImageStorage' => App\Api\Facades\ImageStorageFacade::class,
        'PageTemplates' => App\Api\Facades\PageTemplatesFacade::class,
        'Term' => App\Api\Facades\TermFacade::class,
        'Authorized' => App\Api\Facades\UserAuthorizationFacade::class,
        'RoleCapability' => App\Api\Facades\RoleCapabilityFacade::class,
        'UserCapability' => App\Api\Facades\UserCapabilityFacade::class,
        'CapabilityCache' => App\Api\Facades\CapabilityCacheFacade::class,
    ])->toArray(),

];
