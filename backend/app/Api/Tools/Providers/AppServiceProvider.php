<?php

namespace App\Api\Tools\Providers;

use App\Api\Facades\ApiRouteFacade;
use Illuminate\Console\Events\CommandStarting;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Api\Tools\Repositories\WorkerInterface',
            'App\Api\Tools\Repositories\Eloquents\WorkerEloquent'
        );

        app('events')->listen(CommandStarting::class, [$this, 'recordCommand']);

        $this->commands([
            \App\Api\Tools\Commands\StoreScheduleCommand::class,
        ]);

        $this->commands([
            \App\Api\Tools\Commands\TestEmailCommand::class,
        ]);
    }

    public function boot()
    {
        /** Option capability */
        add_capability('Tool', 'tool');
        add_capability('Email Tester', 'tool-email-tester', 'tool');
        add_capability('Log Viewer', 'tool-log-viewer', 'tool');
        add_capability('View Cron & Queue', 'tool-view-worker', 'tool');

        /** Add menu */
        $tools = [
            'navbarId'          => 'menu-tools',
            'text'              => 'Tools',
            'priority'          => 60,
            'icon'              => 'ph-wrench',
            'capability'        => 'tool',
            'actives'           => [
                'admin/tool/email-tester',
                'admin/tool/log-viewer',
                'admin/tool/worker/*',
            ],
        ];

        add_side_menu($tools);

        /** Start Configuration of Email Tester */
        $emailTester = [
            'text'              => 'Email Tester',
            'priority'          => 10,
            'capability'        => 'tool-email-tester',
            'href'              => 'cms.tool.email-tester',
            'actives'           => 'admin/tool/email-tester',
        ];

        add_side_submenu($emailTester, 'menu-tools');

        $emailTesterRoute = [
            'slug' => '/tool/email-tester',
            'method' => 'GET',
            'args' => [
                'as' => 'tool.email-tester',
                'uses' => '\App\Http\Controllers\Backend\EmailTesterController@index',
            ],
        ];

        ApiRouteFacade::addRoute($emailTesterRoute);

        $emailTesterSendRoute = [
            'slug' => '/tool/email-tester',
            'method' => 'POST',
            'args' => [
                'as' => 'tool.email-tester.tes',
                'uses' => '\App\Http\Controllers\Backend\EmailTesterController@send',
            ],
        ];

        ApiRouteFacade::addRoute($emailTesterSendRoute);

        /** Start Configuration of Log Viewer */
        $logViewer = [
            'text'              => 'Log Viewer',
            'priority'          => 10,
            'capability'        => 'tool-log-viewer',
            'href'              => 'cms.tool.log-viewer',
            'actives'           => 'admin/tool/log-viewer',
        ];

        add_side_submenu($logViewer, 'menu-tools');

        $logViewerRoute = [
            'slug' => '/tool/log-viewer',
            'method' => 'GET',
            'args' => [
                'as' => 'tool.log-viewer',
                'uses' => '\App\Http\Controllers\Backend\LogViewerController',
            ],
        ];

        ApiRouteFacade::addRoute($logViewerRoute);

        /** Start Configuration of Worker */
        $worker = [
            'text'              => 'Cron & Queue',
            'priority'          => 20,
            'capability'        => 'tool-view-worker',
            'href'              => 'cms.tool.worker.cron',
            'actives'           => 'admin/tool/worker/cron',
        ];

        add_side_submenu($worker, 'menu-tools');

        $cron = [
            'slug' => '/tool/worker/cron',
            'method' => 'GET',
            'args' => [
                'as' => 'tool.worker.cron',
                'uses' => '\App\Http\Controllers\Backend\WorkerController@cron',
            ],
        ];

        ApiRouteFacade::addRoute($cron);

        $failedCron = [
            'slug' => '/tool/worker/history-cron',
            'method' => 'GET',
            'args' => [
                'as' => 'tool.worker.history-cron',
                'uses' => '\App\Http\Controllers\Backend\WorkerController@historyCron',
            ],
        ];

        ApiRouteFacade::addRoute($failedCron);

        $job = [
            'slug' => '/tool/worker/job',
            'method' => 'GET',
            'args' => [
                'as' => 'tool.worker.job',
                'uses' => '\App\Http\Controllers\Backend\WorkerController@job',
            ],
        ];

        ApiRouteFacade::addRoute($job);

        $failedJob = [
            'slug' => '/tool/worker/failed-job',
            'method' => 'GET',
            'args' => [
                'as' => 'tool.worker.failed-job',
                'uses' => '\App\Http\Controllers\Backend\WorkerController@failedJob',
            ],
        ];

        ApiRouteFacade::addRoute($failedJob);

        $bulkAction = [
            'slug' => '/tool/worker/bulk-action',
            'method' => 'GET',
            'args' => [
                'as' => 'tool.worker.bulk-action',
                'uses' => '\App\Http\Controllers\Backend\WorkerController@bulkAction',
            ],
        ];

        ApiRouteFacade::addRoute($bulkAction);

        $destroyJob = [
            'slug' => '/tool/worker/{job_type}/{id}/destroy',
            'method' => 'GET',
            'args' => [
                'as' => 'tool.worker.job-destroy',
                'uses' => '\App\Http\Controllers\Backend\WorkerController@destroyJob',
            ],
        ];

        ApiRouteFacade::addRoute($destroyJob);

        $retryJob = [
            'slug' => '/tool/worker/{job_type}/{id}/retry',
            'method' => 'GET',
            'args' => [
                'as' => 'tool.worker.job-retry',
                'uses' => '\App\Http\Controllers\Backend\WorkerController@retryJob',
            ],
        ];

        ApiRouteFacade::addRoute($retryJob);

        // register helper
        require_once app_path().'/Api/Tools/helper.php';
    }

    public function recordCommand(CommandStarting $event)
    {
        if ($event->command !== 'schedule:run' &&
            $event->command !== 'schedule:finish') {
            return;
        }

        collect(app(Schedule::class)->events())->each(function ($event) {
            $event->then(function () use ($event) {
                $name = class_basename($event->description);

                record_command($name);
            });
        });
    }
}
