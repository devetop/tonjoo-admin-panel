<?php

use App\Api\Tools\Repositories\WorkerInterface;

if (! function_exists('record_command')) {
    function record_command($name)
    {
        $worker = resolve(WorkerInterface::class);
        $worker->recordCommand($name);
    }
}

if (! function_exists('to_mysql_date')) {
    function to_mysql_date($date) {
        return explode('/', $date)[2].'-'.explode('/', $date)[0].'-'.explode('/', $date)[1];
    }
}

if (! function_exists('fe_url')) {
    function fe_url($path) {
        return config('app.frontend_dashboard_base_url') . "/$path";
    }
}