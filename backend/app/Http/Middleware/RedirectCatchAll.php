<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectCatchAll
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //if registered in catch all, redirect to catch all page
        $post_type = \Routing::getCurrentPostType();
        if (in_array($post_type, config('cms.frontend.routing.catch-all'))) {
            return redirect()->route('frontend.catch-all', $request->slug);
        }

        return $next($request);
    }
}
