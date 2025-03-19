<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Request;
use Livewire\Controllers\HttpConnectionHandler as BaseHttpConnectionHandler;

class HttpConnectionHandler extends BaseHttpConnectionHandler
{
    public function __invoke()
    {
        $this->applyPersistentMiddleware();

        return $this->handle(
            request([
                'fingerprint',
                'serverMemo',
                'updates',
            ])
        );
    }

    protected function makeRequestFromUrlAndMethod($url, $method = 'GET')
    {
        // Ensure the original script paths are passed into the fake request incase Laravel is running in a subdirectory
        $prefix = request()->server->get('HTTP_X_FORWARDED_PREFIX') ?: '';
        $request = Request::create($url, $method, [], [], [], [
            'SCRIPT_NAME' => $prefix . request()->server->get('SCRIPT_NAME'),
            'SCRIPT_FILENAME' => request()->server->get('SCRIPT_FILENAME'),
            'PHP_SELF' => $prefix . request()->server->get('PHP_SELF'),
        ]);

        if (request()->hasSession()) {
            $request->setLaravelSession(request()->session());
        }

        $request->setUserResolver(request()->getUserResolver());

        $route = app('router')->getRoutes()->match($request);

        // For some reason without this octane breaks the route parameter binding.
        $route->setContainer(app());

        $request->setRouteResolver(function () use ($route) {
            return $route;
        });

        return $request;
    }
}
