<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    public function handle($request, \Closure $next, ...$guards)
    {
        // ubah config agar mendahulukan auth bearer daripada cookie
        if (in_array('application-token', $guards) && $request->bearerToken()) {
            config()->set('sanctum.guard', ['web']);
        }
        
        $this->authenticate($request, $guards);

        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if (in_array('auth:admin', $request->route()->gatherMiddleware())) {
                return route('cms.login');
            }

            if (in_array('auth:dashboard', $request->route()->gatherMiddleware())) {
                return route('dashboard.login');
            }

            return route('cms.login', [
                'message' => 'Unauthenticated.'
            ]);
        }
    }
}
