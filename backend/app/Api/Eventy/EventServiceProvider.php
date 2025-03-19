<?php

namespace App\Api\Eventy;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Registers the eventy singleton.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('eventy', function ($app) {
            return new Events();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Adds a directive in Blade for actions
         */
        Blade::directive('action', function ($expression) {
            return "<?php Eventy::action({$expression}); ?>";
        });

        /*
         * Adds a directive in Blade for filters
         */
        Blade::directive('filter', function ($expression) {
            return "<?php echo Eventy::filter({$expression}); ?>";
        });
    }
}
